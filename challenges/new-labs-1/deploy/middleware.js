let jwt = require("jsonwebtoken");
require("dotenv").config();

let checkToken = (req, res, next) => {
  var cookie = req.headers.cookie;
  var token = "no token";

  if (cookie) {
    cookie = cookie.split("; ");
    for (var i = 0; i < cookie.length; i++) {
      if (cookie[i].startsWith("authorization=")) {
        token = cookie[i].slice(14, cookie[i].length);
      }
    }

    if (token.startsWith("Bearer ")) {
      // Remove Bearer from string
      token = token.slice(7, token.length);
    }

    try {
      var decoded = jwt.verify(token, process.env.JWT_SECRET);
      req.decoded = decoded;
      next();
    } catch (err) {
      res.render("user", { data: { authorization: "unauthorized" } });
      return;
    }
  } else {
    res.render("user", { data: { authorization: "unauthorized" } });
    return;
  }
};

module.exports = {
  checkToken: checkToken,
};
