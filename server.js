const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Configurar o Body-parser
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Configurar a conexão com o banco de dados
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'test',
});

db.connect((err) => {
    if (err) {
        console.error('Erro ao conectar ao banco de dados:', err);
    } else {
        console.log('Conectado ao banco de dados');
    }
});

// Defina uma rota que aceita um parâmetro ID
app.get('/api/users/:id', (req, res) => {
    const userId = req.params.id;

    // Execute a consulta SQL para buscar o usuário pelo id_user
    db.query('SELECT * FROM usuarios WHERE id_user = ?', [userId], (err, result) => {
        if (err) {
            console.error('Erro ao buscar dados no banco de dados:', err);
            res.status(500).json({ error: 'Erro interno do servidor' });
        } else {
            if (result.length === 0) {
                res.status(404).json({ error: 'Usuário não encontrado' });
            } else {
                res.json(result[0]); // Retorna o primeiro resultado encontrado
            }
        }
    });
});

// Iniciar o servidor
app.listen(port, () => {
    console.log(`Servidor ouvindo na porta ${port}`);
});