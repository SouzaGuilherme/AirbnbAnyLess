import {getAllUser} from '../models/userModels.js';
// Get all users
export const showAllUser = (req, res) => {
  getAllUser((err, response) => {
    if (err){
      res.send(err);
    }else{
      //for testing
      res.send(response);
    }
  });
}
