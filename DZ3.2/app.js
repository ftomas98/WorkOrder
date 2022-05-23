var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mysql = require('mysql');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
extended: true
}));
// default route
app.get('/', function (req, res) {
return res.send({ error: true, message: 'hello' })
});
// connection configurations
var dbConn = mysql.createConnection({
host: 'localhost',
user: 'root',
password: '',
database: 'hr_dept'
});
// connect to database
dbConn.connect(); 
// Retrieve all employees 
app.get('/employees', function (req, res) {
dbConn.query('SELECT * FROM employees', function (error, results, fields) {
if (error) throw error;
return res.send({ error: false, data: results, message: 'All employees list.' });
});
});
// Retrieve employee with emp_no 
app.get('/employee/:id', function (req, res) {
let emp_id = req.params.id;
if (!emp_id) {
return res.status(400).send({ error: true, message: 'Please provide emp_id' });
}
dbConn.query('SELECT * FROM employees where emp_no=?', emp_id, function (error, results, fields) {
	if (error) throw error;
	//return res.send({ error: false, data: results[0], message: 'Single employee list error.' });
	return res.send({ error: false, data: results[0], message: 'Single employee list.' });
	});
});
// Add a new employee  
app.post('/employee', function (req, res) {
	let employee = req.body.employee;
	let emp_no = employee.emp_no;
	let birth_date = employee.birth_date;
	let first_name = employee.first_name;
	let last_name = employee.last_name;
	let hire_date = employee.hire_date;
	let gender = employee.gender;
	//dopuniti
	if (!employee) {
	return res.status(400).send({ error:true, message: 'Please provide employee' });
	}
	dbConn.query("INSERT INTO employees VALUES(?, ?, ?, ?, ?, ?)",[emp_no, birth_date, first_name, last_name, gender, hire_date], function (error, results, fields) {
	if (error) throw error;
	return res.send({ error: false, data: results, message: 'New Employee has been created successfully.' });
	});
});
//  Update employee with id
app.put('/employee', function (req, res) {
	//let emp_no = req.body.employee.emp_no;
	 console.log('body :', req.body.employee);
	let employee = req.body.employee;
	let emp_no = employee.emp_no;
	let first_name = employee.first_name;
	let last_name = employee.last_name;
	let birth_date = employee.birth_date;
	let gender = employee.gender;
	let hire_date = employee.hire_date;
	//dopuniti

		if (!emp_no || !employee) {
		return res.status(400).send({ error: employee, message: 'Please provide employee and emp_no' });
		}
	dbConn.query("UPDATE employees SET first_name = ?, last_name = ?, birth_date = ?, gender =?, hire_date = ? where emp_no = ?", [first_name, last_name, birth_date, gender, hire_date, emp_no], function (error, results, fields) {
	if (error) throw error;
	return res.send({ error: false, data: results, message: 'Employee has been updated successfully.' });
	});
});
//  Delete employee
app.delete('/employee/:id', function (req, res) {
	let emp_id = req.params.id;
	if (!emp_id) {
	return res.status(400).send({ error: true, message: 'Please provide emp_id' });
	}
	dbConn.query('DELETE FROM employees where emp_no = ?', [emp_id], function (error, results, fields) {
	if (error) throw error;
	return res.send({ error: false, data: results, message: 'Employee  has been deleted successfully.' });
	});
}); 
// set port
app.listen(3000, function () {
	console.log('Node MySQL REST API app is running on port 3000');
});
module.exports = app;