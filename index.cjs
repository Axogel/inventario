 const express = require('express');
 const mysql = require('mysql');
// import { express } from "express";
// import {mysql} from "mysql";
// import { firefox, chromium } from "playwright";
// import  dotenv from "dotenv";
// import { firefox, chromium } from "playwright";
const {chromium} = require("playwright");
 require('dotenv').config();


const app = express();
const port = 3000;

const db = mysql.createConnection({
  host: process.env.DB_HOST,
  user: process.env.DB_USERNAME,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_DATABASE
});
db.connect((err) => {
  if (err) {
    console.error('Error al conectar a la base de datos:', err);
  } else {
    console.log('Conexión exitosa a la base de datos');
  }
});
const scrapping = async () => {
  const browser = await chromium.launch({ headless: true });
  const browserContext = await browser.newContext();
  try {
      const page = await browserContext.newPage();
      const url = "https://www.xe.com/es/currencyconverter/convert/?Amount=1&From=USD&To=COP"
      await page.goto(url, { waitUntil: "domcontentloaded", timeout: 60000 });
      await page.waitForTimeout(5000);
      const results = await page.$eval('body', async (body) => {
          const money = body.querySelector('p.result__BigRate-sc-1bsijpp-1.dPdXSB')
          const values = money.textContent.trim().split(" ")
          const Money = {
              value: values[0],
              unit: values[1]
          }
          return Money
      })
      return results
  } catch (err) {
      console.log(err)
  } finally {
      await browser.close()
  }
}

app.get('/traer', async (req, res)  => {
 
  const result =  await scrapping();
  res.status(200).send(result);



});

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});
