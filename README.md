# test-assignment

# Task1 - An importer which will import data from the xlsx file and insert them into the database.

## Specifications:
1. Red fields are mandatory.
2. All column on the excel file must be txt formated.
3. The correct format for date is: yyyy-mm-dd ex: 2019-10-2

## Codebase structure of task1:
1. codebase - It conatins all the code and external dependecy files to run the importer utility.
2. dependency files - It conatins a sql for database and a xlsx sample file to use for import. 

## Setup
1. Place task1 folder anywhere on the local server (Preferably htdocs on XAMPP)
2. Make sure XAMPP is running.
3. Import database by using file 'task1.sql' from 'task1/dependency files'
4. Open Google Chrome browser and hit the URL - "localhost/task1/codebase".
5. It will load the importer utility and you are done with the setup.

## Steps to use the importer utility
1. On imported utility page click on the 'choose file' button and select the 'import-sample.xlsx' from 'task1/dependency files'.
2. Click on 'upload' button it will submit the page.
3. Adhering specificatio point 1 the valid record row from 'import-sample.xlsx' file will be uploaded and count of successful record insertion will be displayed in page.
4. For instance 1 record (row no 4) from 'import-sample.xlsx' will not be uploaded/inserted into database and field name (mobile number), row number will be displayed as error notice.

## import-sample.xlsx
1. This excel file will have 6 columns/fieds - Roll no, name, mobile number, email Id, DOB and address.
2. Complying with point 1 from specification following fields are in red colour and mandatory for record to be uploaded/inserted into database - name and mobile number.

## External dependecies
1. I have used a library called PHPExcel (https://github.com/PHPOffice/PHPExcel) to import data from PHP

===========================================================================

# Task2 - Backend work for Reimbursement Module

## Specifications:
1. Create Tables in the database required to store Reimbursement Form
2. Create API endpoints For Following
* API to submit the Reimbursement Form
* API to Fetch the All Reimbursement details Date wise
* API to Fetch 1 Reimbursement Entry


## Codebase structure of task1:
1. codebase - It conatins all the code files needed for backend to work.
2. dependency files - It conatins a sql for database. 

## Setup
1. Place task2 folder anywhere on the local server (Preferably htdocs on XAMPP)
2. Make sure XAMPP is running.
3. Import database by using file 'task2.sql' from 'task2/dependency files'.
4. If everything goes well then you are ready to test the endpoints.

## How to test the endpoints?
### 1. API to submit the Reimbursement Form.
* Endpoint url: localhost/task2/codebase/api/create.php
* Http method: POST
* Response type: JSON
* Post body params: 'employee_id' will be numeric value, 'purpose' - will be text decsription, 'reimbursement_dt' will be a date (yyyy-mm-dd) in following format for now and  'amount' will be float value.
* I have used Postman software for testing this API.
### 2. API to Fetch 1 Reimbursement Entry
* Endpoint url: localhost/task2/codebase/api/read.php?reimbursement_id=1
* Http method: GET
* Response type: JSON
* Qyery string: 'reimbursement_id' will be a numeric id which will return record against it otherwise blank array will be returned.
* You can use Postman or hit that URL in the browser to test it.
### 3. API to Fetch the All Reimbursement details Date wise
* Endpoint url: localhost/task2/codebase/api/read_datewise.php?from_dt=2021-06-04&to_dt=2021-06-09
* Http method: GET
* Response type: JSON
* Qyery string: 'from_dt' will be a from date (yyyy-mm-dd) and 'to_dt' will be a to date (yyyy-mm-dd) to return all the reimbursment records taken place into given date range. In case there are no reimbursement record for given date range then empty array will be returned.
* You can use Postman or hit enpoint URL in the browser to test it.
