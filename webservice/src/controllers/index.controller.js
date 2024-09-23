const {Pool} = require('pg');

const pool = new Pool({
    //connectionString: 'postgres://vzedzxjijdlfkf:d9d4c885bcc49e675bb05a2150184a6bb6079bddc564e5cfe91822cbb349f5c6@ec2-23-21-229-200.compute-1.amazonaws.com:5432/dcdfsn5p35tm6f',
    connectionString:'postgres://postgres:Matematica5.@127.0.0.1:5432/CocktailMaps',
    //ssl: {
    //    rejectUnauthorized: false
    //}
})
const BASE_URL = process.env.BASE_URL || 'http://localhost/';
const itemsPerPage=6;


const getUsers = async (req,res) => {
    const response = await pool.query('SELECT * FROM users');
    res.json(response.rows);
}

const getBars = async (req,res) => {
    let page= req.query.page;
    if (isNaN(page) || page<=0)
        page=1;
    const countResponse = await pool.query('SELECT count(*) FROM bars');
    const lastPage = (countResponse.rows[0].count - page*itemsPerPage) <= 0;
    const response = await pool.query('SELECT id_bar,nombre,ubicacion,descripcion,archivos_adjuntos FROM bars LIMIT '+itemsPerPage+' OFFSET '+(page - 1) * itemsPerPage);
    const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Bar'")
    response.rows.forEach(bar => {
        if (bar.archivos_adjuntos != null)
            bar.archivos_adjuntos = `${BASE_URL}bars/${bar.id_bar}/image`;
        bar.etiquetas=etiquetasDeUnBar(etiquetasResponse,bar)
    })
    res.status(200).send({
        "bars": response.rows,
        "lastPage": lastPage
    });
}

const getBar = async (req,res) => {
    const id_bar=req.paramInt('id_bar');
    if (!isNaN(id_bar)){
        try{
            const response = await pool.query('SELECT * FROM bars where id_bar = $1',[id_bar]);
            const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Bar'")
            var bar = response.rows[0]
            bar.etiquetas=etiquetasDeUnBar(etiquetasResponse,bar)
            if (bar.archivos_adjuntos != null)
                bar.archivos_adjuntos = `${BASE_URL}bars/${bar.id_bar}/image`;
            res.json([bar]);
        }
        catch(err){
            res.status(404).send({
                "name": "Not Found Exception",
                "message": "The requested resource was not found.",
                "code": 0,
                "status": 404
            });
        }
    }
    else
        res.status(403).send();
}

const getBarByName = async (req,res) => {
    const name = req.paramString('name');
    const response = await pool.query('SELECT * FROM bars where nombre like $1',["%"+name+"%"]);
    const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Bar'")
    response.rows.forEach(bar => {
        if (bar.archivos_adjuntos != null)
            bar.archivos_adjuntos = `${BASE_URL}bars/${bar.id_bar}/image`;
        bar.etiquetas=etiquetasDeUnBar(etiquetasResponse,bar)
    })
    res.status(200).json(response.rows);
}

const getBarByAddress = async (req,res) => {
    const address = req.paramString('address');
    const response = await pool.query('SELECT * FROM bars where ubicacion like $1',["%"+address+"%"]);
    const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Bar'")
    response.rows.forEach(bar => {
        if (bar.archivos_adjuntos != null)
            bar.archivos_adjuntos = `${BASE_URL}bars/${bar.id_bar}/image`;
        bar.etiquetas=etiquetasDeUnBar(etiquetasResponse,bar)
    })
    res.status(200).json(response.rows);
}

function etiquetasDeUnBar(etiquetasResponse,bar) {
    let etiquetas = Array()
    etiquetasResponse.rows.forEach(elem => {
        if (elem.etiquetable_id == bar.id_bar)
           etiquetas.push({"nombre":elem.nombre, "id":elem.id})
    })
    return etiquetas
}

const getBarImage = async (req,res) => {
    try{
        const id_bar=req.paramInt('id_bar');
        if (!isNaN(id_bar)){
            const fs = require('fs');
            const response = await pool.query("SELECT encode(archivos_adjuntos,'base64') FROM bars where id_bar = $1", [id_bar]);
            console.log(response.rows[0].encode);
            var respuesta=Buffer.from(response.rows[0].encode,'base64');
            var rta=respuesta.toString('utf-8');
            let buff = Buffer.from(rta, 'base64');
            fs.writeFileSync('imagen.jpg', buff, function (err) {
                console.log('File created');
            });
            const mimeType = 'image/jpg';
            res.writeHead(200, { 'Content-Type': mimeType });
            res.write(buff);
            res.end();
        }
        else
            res.status(403).send();
    }
    catch(err){
        res.status(404).send({
            "name": "Not Found Exception",
            "message": "The requested resource was not found.",
            "code": 0,
            "status": 404
        });
    }
}

const getTragos = async (req,res) => {
    let page= req.query.page;
    if (isNaN(page)  || page<=0)
        page=1;
    const countResponse = await pool.query('SELECT count(*) FROM tragos');
    const lastPage = (countResponse.rows[0].count - page*itemsPerPage) <= 0;
    const response = await pool.query('SELECT * FROM tragos LIMIT '+itemsPerPage+' OFFSET '+(page - 1) * itemsPerPage);
    const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Trago'")
    response.rows.forEach(trago => {
        if(trago.archivos_adjuntos != null)
            trago.archivos_adjuntos = `${BASE_URL}tragos/${trago.id_trago}/image`;
        trago.etiquetas=etiquetasDeUnTrago(etiquetasResponse,trago)
    })
    res.status(200).send({
        "tragos": response.rows,
        "lastPage": lastPage
    });
}

const getTragosByBar = async (req,res) => {
    const id_bar=req.paramInt('id_bar');
    if (!isNaN(id_bar)){
        let page= req.query.page;
        if (isNaN(page)  || page<=0)
            page=1;
        const countResponse = await pool.query('SELECT count(*) FROM tragos WHERE id_bar = $1',[id_bar]);
        const lastPage = (countResponse.rows[0].count - page*itemsPerPage) <= 0;
        const response = await pool.query('SELECT * FROM tragos WHERE id_bar = $1 LIMIT '+itemsPerPage+' OFFSET '+(page - 1) * itemsPerPage,[id_bar]);
        const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Trago'")
        response.rows.forEach(trago => {
            if(trago.archivos_adjuntos != null)
                trago.archivos_adjuntos = `${BASE_URL}tragos/${trago.id_trago}/image`;
            trago.etiquetas=etiquetasDeUnTrago(etiquetasResponse,trago)
            })
        res.status(200).send({
            "tragos": response.rows,
            "lastPage": lastPage
        });
    }
    else
        res.status(403).send();
}

const getTrago = async (req,res) => {
    const id_trago=req.paramInt('id_trago');
    if (!isNaN(id_trago)){
        try{
            const response = await pool.query('SELECT * FROM tragos where id_trago = $1',[id_trago]);
            const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Trago'")
            var trago=response.rows[0]
            if(trago.archivos_adjuntos != null)
                trago.archivos_adjuntos= `${BASE_URL}tragos/${trago.id_trago}/image`;
            trago.etiquetas=etiquetasDeUnTrago(etiquetasResponse,trago)
            res.json([trago]);
        }
        catch(err){
            res.status(404).send({
                "name": "Not Found Exception",
                "message": "The requested resource was not found.",
                "code": 0,
                "status": 404
            });
        }
    }
    else
        res.status(403).send();
}

function etiquetasDeUnTrago(etiquetasResponse,trago) {
    let etiquetas = Array()
    etiquetasResponse.rows.forEach(elem => {
        if (elem.etiquetable_id == trago.id_trago)
           etiquetas.push({"nombre":elem.nombre, "id":elem.id})
    })
    return etiquetas
}

const getTragoImage = async (req,res) => {
    try{
        const id_trago=req.paramInt('id_trago');
        if (!isNaN(id_trago)){
            const fs = require('fs');
            const response = await pool.query("SELECT encode(archivos_adjuntos,'base64') FROM tragos where id_trago = $1", [id_trago]);
            var respuesta=Buffer.from(response.rows[0].encode,'base64');
            //usar buffer para devolver una imagen dice q busque en internet
            //header que indique que devuelvo una imagen
            var rta=respuesta.toString('utf-8');
            let buff = Buffer.from(rta, 'base64');
            fs.writeFileSync('imagen.jpg', buff, function (err) {
                console.log('File created');
            });
            const mimeType = 'image/jpg';
            res.writeHead(200, { 'Content-Type': mimeType });
            res.write(buff);
            res.end();
        }
        else
            res.status(403).send();
    }
    catch(err){
        res.status(404).send({
            "name": "Not Found Exception",
            "message": "The requested resource was not found.",
            "code": 0,
            "status": 404
        });
    }
}

const getTutorials = async (req,res) => {
    let page= req.query.page;
    if (isNaN(page)  || page<=0)
        page=1;
    const countResponse = await pool.query('SELECT count(*) FROM tutorials');
    const lastPage = (countResponse.rows[0].count - page*itemsPerPage) <= 0;
    const response = await pool.query('SELECT * FROM tutorials LIMIT '+itemsPerPage+' OFFSET '+(page - 1) * itemsPerPage);
    const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Tutorial'")
    response.rows.forEach(tutorial => {
        if (tutorial.archivos_adjuntos != null)
            tutorial.archivos_adjuntos = `${BASE_URL}tutorials/${tutorial.id_tutorial}/image`;
        tutorial.etiquetas=etiquetasDeUnTutorial(etiquetasResponse,tutorial)
    })
    res.status(200).send({
        "tutorials": response.rows,
        "lastPage": lastPage
    });
}

const getTutorialsByTrago = async (req,res) => {
    const id_trago=req.paramInt('id_trago');
    if (!isNaN(id_trago)){
        let page= req.query.page;
        if (isNaN(page)  || page<=0)
            page=1;
        const countResponse = await pool.query('SELECT count(*) FROM tutorials WHERE id_trago = $1',[id_trago]);
        const lastPage = (countResponse.rows[0].count - page*itemsPerPage) <= 0;
        const response = await pool.query('SELECT * FROM tutorials WHERE id_trago = $1 LIMIT '+itemsPerPage+' OFFSET '+(page - 1) * itemsPerPage,[id_trago]);
        const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Tutorial'")
        response.rows.forEach(tutorial => {
            if(tutorial.archivos_adjuntos != null)
                tutorial.archivos_adjuntos = `${BASE_URL}tutorials/${tutorial.id_tutorial}/image`;
            tutorial.etiquetas=etiquetasDeUnTutorial(etiquetasResponse,tutorial)
            })
        res.status(200).send({
            "tutorials": response.rows,
            "lastPage": lastPage
        });
    }
    else
        res.status(403).send();
}

const getTutorial = async (req,res) => {
    const id_tutorial=req.paramInt('id_tutorial');
    if (!isNaN(id_tutorial)){
        try{
            const response = await pool.query('SELECT * FROM tutorials where id_tutorial = $1',[id_tutorial]);
            const etiquetasResponse = await pool.query("Select nombre,etiquetas.id,etiquetable_id from (etiquetas left join etiquetables on etiquetas.id=etiquetables.etiqueta_id) where etiquetable_type='App\\Models\\Tutorial'")
            var tutorial = response.rows[0]
            if (tutorial.archivos_adjuntos != null)
                tutorial.archivos_adjuntos= `${BASE_URL}tutorials/${tutorial.id_tutorial}/image`;
            tutorial.etiquetas=etiquetasDeUnTutorial(etiquetasResponse,tutorial)
            res.json([tutorial]);
        }
        catch(err){
            res.status(404).send({
                "name": "Not Found Exception",
                "message": "The requested resource was not found.",
                "code": 0,
                "status": 404
            });
        }
    }
    else
        res.status(403).send;
}

function etiquetasDeUnTutorial(etiquetasResponse, tutorial) {
    let etiquetas = Array()
    etiquetasResponse.rows.forEach(elem => {
        if (elem.etiquetable_id == tutorial.id_trago)
           etiquetas.push({"nombre":elem.nombre, "id":elem.id})
    })
    return etiquetas
}

const getTutorialImage = async (req,res) => {
    try{
        const id_tutorial=req.paramInt('id_tutorial');
        if (!isNaN(id_tutorial)){
            const fs = require('fs');
            const response = await pool.query("SELECT encode(archivos_adjuntos,'base64') FROM tutorials where id_tutorial = $1", [id_tutorial]);
            var respuesta=Buffer.from(response.rows[0].encode,'base64');
            var rta=respuesta.toString('utf-8');
            let buff = Buffer.from(rta, 'base64');
            fs.writeFileSync('imagen.jpg', buff, function (err) {
                console.log('File created');
            });
            const mimeType = 'image/jpg';
            res.writeHead(200, { 'Content-Type': mimeType });
            res.write(buff);
            res.end();
        }
        else
            res.status(403).send();
    }
    catch(err){
        res.status(404).send({
            "name": "Not Found Exception",
            "message": "The requested resource was not found.",
            "code": 0,
            "status": 404
        });
    }
}

const getEtiquetas = async (req,res) => {
    let page= req.query.page;
    if (isNaN(page))
        page=1;
    const countResponse = await pool.query('SELECT count(*) FROM etiquetas');
    const lastPage = (countResponse.rows[0].count - page*itemsPerPage) <= 0;
    const response = await pool.query('SELECT * FROM etiquetas LIMIT '+itemsPerPage+' OFFSET '+(page - 1) * itemsPerPage);
    res.status(200).send({
        "etiquetas": response.rows,
        "lastPage": lastPage
    });
}

const getEtiqueta = async (req,res) => {
    const id_etiqueta=req.paramInt('id_etiqueta');
    if (!isNaN(id_etiqueta)){
        try{
        const response = await pool.query('SELECT * FROM etiquetas where id = $1',[id_etiqueta]);
        res.json(response.rows);
        }
        catch(err){
            res.status(404).send({
                "name": "Not Found Exception",
                "message": "The requested resource was not found.",
                "code": 0,
                "status": 404
            });
        }
    }
    else
        res.status(403).send();
}

module.exports = {
    getUsers,
    getBars,
    getBar,
    getBarByName,
    getBarByAddress,
    getBarImage,
    getTragos,
    getTragosByBar,
    getTrago,
    getTragoImage,
    getTutorials,
    getTutorialsByTrago,
    getTutorial,
    getTutorialImage,
    getEtiquetas,
    getEtiqueta,
}