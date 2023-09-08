//conexión con la base de datos​
const conexion = require('../config/conexion');
//------------- realiza los método para cada operaciones​
const express = require("express");
const ruta = express();
// para capturar los parametros​
const bodyParser = require('body-parser');
ruta.use(bodyParser.json())  
//-------------------------------​
ruta.get('/', function(req, res) {
    res.json({ mensaje: '¡Index Apartamentos pagos!' })  
  })
//------- getpropietario  ---------------------​
  ruta.get('/ap_pago', function(req, res) {
    res.json({ mensaje: '¡Index Apartamentos pagos!' })  
  })

//---------- post apartamento pagos------------------------​
  ruta.post('/ap_pago', async (req, res) => {
    try {
        const apartamento = req.body.apartamentos;
        const pagos = apartamento.pagos;
    
        await conexion.beginTransaction();
    
        const apartamentoQuery = 'INSERT INTO apartamentos (numero, habitaciones, bathroom,area, torres_id, propietarios_id) VALUES (?, ?, ?, ?, ?,?)';
        const apartamentoValues = [apartamento.numero, apartamento.habitaciones, apartamento.bathroom, apartamento.area, apartamento.torres_id, apartamento.propietarios_id];
        const resultApartamento = await conexion.query(apartamentoQuery, apartamentoValues);
        const apartamentoId = resultApartamento.insertId;
    
        const pagosQuery = 'INSERT INTO pagos (year, mes, fecha, valor, descripcion, apartamentos_id) VALUES (?, ?, ?, ?, ?, ?)';
        for (const pago of pagos) {
          const pagoValues = [pago.year, pago.mes, pago.fecha, pago.valor, pago.descripcion, apartamentoId];
          await conexion.query(pagosQuery, pagoValues);
        }
    
        await conexion.commit();

        res.status(200).json({ message: 'Datos guardados exitosamente.' });
      } catch (error) {
        await conexion.rollback();
        console.error(error);
        res.status(500).json({ message: 'Error al guardar los datos.' });
      }
  });
  

module.exports = ruta;