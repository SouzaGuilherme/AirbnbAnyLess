import {showAllUser} from '../controllers/user.js';
import express from 'express';
// Rotas
const router = express.Router();
// Rotas -> [Home Page]
router.get('/', showAllUser);
export default router;
