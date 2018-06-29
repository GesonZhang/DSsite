var express = require('express');
var router = express.Router();
var request = require('request');

// 解决跨域问题
router.all('*', function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "X-Requested-With");
    res.header("Access-Control-Allow-Methods", "PUT,POST,GET,DELETE,OPTIONS");
    res.header("X-Powered-By", ' 3.2.1');
    res.header("Content-Type", "application/json;charset=utf-8");
    next();
});

// 注册
router.get('/reg', function(req, res, next) {
    request.post({
        url: 'http://localhost/ttyk/phpci/users/reg',
        form: {
            identify: req.query.identify,
            name: req.query.name,
            account: req.query.account,
            password: req.query.password,
            phone: req.query.phone,
            sex: req.query.sex,
            school: req.query.school,
            education: req.query.education,
        }
    }, function(error, response, body) {
        if (!error && response.statusCode == 200){
            res.json(body);
        }
    });
});

// 登录
router.get('/login', function(req, res, next) {
    request.post({
        url: 'http://localhost/ttyk/phpci/users/login',
        form: {
            account: req.query.account,
            password: req.query.password
        }
    }, function(error, response, body) {
        if (!error && response.statusCode == 200){
            res.json(body);
        }
    });
});

// 关注
router.get('/attention', function(req, res, next) {
    var id = req.query.id;
    request.get("http://localhost/ttyk/phpci/users/attention?id=" + id, function(error, response, body) {
        if (!error && response.statusCode == 200){
            res.json(body);
        }
    });
});

// 切换关注
router.get('/toggle_attention', function(req, res, next) {
    var t_id = req.query.t_id;
    var s_id = req.query.s_id;
    request.get("http://localhost/ttyk/phpci/users/toggle_attention?t_id=" + t_id + "&s_id=" + s_id, function(error, response, body) {
        if (!error && response.statusCode == 200){
            res.json(body);
        }
    });
});

//check_old
router.get('/check_old', function(req, res, next) {
    var oldPassword = req.query.oldPassword;
    var identify = req.query.identify;
    var id = req.query.id;
    request.post({ url: 'http://127.0.0.1/ttyk/phpci/Users/check_old', form: { oldPassword: oldPassword, identify: identify,id:id } }, function(error, response, body) {
        if (!error && response.statusCode == 200) {
            res.json(body);
        } else {
            console.log('failed');
        }
    });
})

//update password
router.post('/update_password', function(req, res, next) {
    var newPassword = req.body.newPassword;
    var identify = req.body.identify;
    var id = req.body.id;
    request.post({ url: 'http://127.0.0.1/ttyk/phpci/Users/update_password', form: { newPassword: newPassword, identify: identify, id: id } }, function(error, response, body) {
        if (!error && response.statusCode == 200) {
            res.json(body);
        } else {
            console.log('failed');
        }
    });
})

module.exports = router;