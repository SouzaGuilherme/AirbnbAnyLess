import db from '../config-db/database.js';
console.log(db);
// Get all users
export const getAllUser = (result) => {
  db.query("SELECT * FROM user", (err, response) => {             
    if(err) {
      console.log(err);
      result(err, null);
    } else {
      result(null, response);
    }
  });   
}
