//run this file (node initialize_db.js) to create a .db file (delete the existing one of the same name first)

var sqlite3 = require("sqlite3").verbose();

var db = new sqlite3.Database((filename = "./injection.db"));
db.serialize(function () {
  db.run(
    "CREATE TABLE user (username TEXT, password TEXT, name TEXT, DOB TEXT, POB TEXT, notes TEXT, protected TEXT)"
  );
  db.run(
    "INSERT INTO user VALUES ('IT_SUPPORT', 'IT@123', 'IT Support Account', '1/1/00', 'Los Angeles', 'for passwords: online-toolz encryption, table: employee_passwords', 'unprotected')"
  );
  db.run(
    "INSERT INTO user VALUES ('admin', 'admin123', 'App Administrator', '1/1/00', 'Los Angeles', 'Restrcited access only! flag{top_secret}', 'unprotected')"
  );
  db.run(
    "INSERT INTO user VALUES ('m_reyes', 'miranda_is_cool', 'Employee Miranda Reyes', '2/28/95', 'Luna',  'no notes yet', 'protected')"
  );
  db.run(
    "INSERT INTO user VALUES ('r_james', 'ricky425', 'Employee Rick James', '3/27/97', 'Portland',  'no notes yet', 'unprotected')"
  );
  db.run(
    "INSERT INTO user VALUES ('c_bert', 'legen_dary', 'Founder Cye Bert', '09/07/1970', 'Ontario',  ' Latest update on the search for legendaries : (Berlin 02.13.21) I found a clue that reads flag{f0ll0w_th3_s0urc3} . I wonder what it could mean? ', 'protected')"
  );
  db.run("CREATE TABLE unreachable_table (name TEXT, password TEXT, secret TEXT)");
  db.run(
    "INSERT INTO unreachable_table VALUES('geronimo', 'abcde1234', 'I like ranch on pizza.')"
  );
  db.run(
    "INSERT INTO unreachable_table VALUES('stewie', 'kiwitoast', 'I would rather starve than eat candy.')"
  );
  db.run("CREATE TABLE employee_passwords (name TEXT, password TEXT)");
  db.run(
    "INSERT INTO employee_passwords VALUES ('Rick James', 'I/PgvFo+euFhyeKIy5I54sZI6u/zFDuY/zZVCctzZzc=')"
  );
  db.run(
    "INSERT INTO employee_passwords VALUES ('Miranda Reyes', 'JiIICB5r0tiIifp2iRCmPXS3FD3G7A195nQ5XfmSEc4=')"
  );
  db.run("CREATE TABLE legendary_report (name TEXT, time TEXT, place TEXT)");
  db.run(
    "INSERT INTO legendary_report VALUES ('REDACTED', 'REDACTED', 'REDACTED')"
  );
  db.run(
    "INSERT INTO legendary_report VALUES ('REDACTED', 'REDACTED', 'REDACTED')"
  );
  db.run(
    "INSERT INTO legendary_report VALUES ('REDACTED', 'REDACTED', 'REDACTED')"
  );
  db.run(
    "INSERT INTO legendary_report VALUES ('REDACTED', 'REDACTED', 'REDACTED')"
  );
  db.run(
    "INSERT INTO legendary_report VALUES ('REDACTED', 'REDACTED', 'REDACTED')"
  );
  db.run(
    "INSERT INTO legendary_report VALUES ('REDACTED', 'REDACTED', 'REDACTED')"
  );

  db.run("CREATE TABLE inconspicuous_data_table (time TEXT, place TEXT)");
  db.run(
    "INSERT INTO inconspicuous_data_table VALUES ('June 1987', 'Ontario')"
  );
  db.run(
    "INSERT INTO inconspicuous_data_table VALUES ('July 1987', 'Kuala Lumpur')"
  );
  db.run(
    "INSERT INTO inconspicuous_data_table VALUES ('October 1995', 'Beijing')"
  );
  db.run(
    "INSERT INTO inconspicuous_data_table VALUES ('September 1999', 'Canberra')"
  );
  db.run(
    "INSERT INTO inconspicuous_data_table VALUES ('February 2003', 'Reykjavik')"
  );
  db.run(
    "INSERT INTO inconspicuous_data_table VALUES ('August 2011', 'Santiago')"
  );
  db.run(
    "INSERT INTO inconspicuous_data_table VALUES ('December 2017', 'Vienna')"
  );
  db.run(
    "INSERT INTO inconspicuous_data_table VALUES ('December 2020', 'Algiers')"
  );
});
