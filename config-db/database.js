import mysql from 'mysql2';
const db = mysql.createConnection({
  host: 'localhost',
  user: 'userTeam',
  password: 'senha123',
  database: 'AirbnbAnyLess'
});
export default db;
