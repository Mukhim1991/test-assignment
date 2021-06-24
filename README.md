# test-assignment

# Task1 - An importer which will import data from the xlsx file and insert them into the database.

## Specifications:
1. Red fields are mandatory.
2. All column on the excel file must be txt formated.
3. The correct format for date is: yyyy-mm-dd ex: 2019-10-2

## Codebase structure of task1:
1. codebase - It conatins all the code and dependecy files to run the importer utility.
2. dependency files - It conatins a sql for database and a xlsx sample file to use for import. 

## How to run setup?
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
