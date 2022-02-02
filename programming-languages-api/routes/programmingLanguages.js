const express = require('express');
const router = express.Router();

// var path = require('path');
// var filename = path.basename('/Users/Refsnes/demo_path.js');
// console.log(path.basename);




const programmingLanguages = require('../services/programmingLanguage');

/* GET programming languages. */
router.get('/', async function(req, res, next) {
  try {
    res.json(await programmingLanguages.getMultiple(req.query.page));
  } catch (err) {
    console.error(`Error while getting programming languages `, err.message);
    next(err);
  }
});

module.exports = router;