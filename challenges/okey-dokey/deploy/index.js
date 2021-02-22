const express = require('express');
const app = express();
const path = require('path');
const PORT = 3000;

app.use(express.static(path.join(__dirname, 'src')));

// jibberish challenge
app.get('/jibberish', (req, res) => {
    res.sendFile('./src/jibberish.html', { root: __dirname });
});

app.get('/okey-dokey', (req, res) =>{ 
    res.sendFile('./src/okey-dokey.html', { root: __dirname } )

});
app.listen(PORT, () => {
    console.log(`listening on port ${PORT}`);
  })