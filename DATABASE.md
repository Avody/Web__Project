/******************** FOR DATABASE(phpmyadmin) ******************/

DATABASE NAME: users_project
SERVER NAME = "localhost";
DB USERNAME = "root";
DATABASE PASSWORD = "";


(3) TABLES:
1)users
2)uploaded_files
3)cache_directives

/***********COLUMNS FOR users******************/

usersId(primary key,int,not-null,auto-increment),
usersFullname(varchar(128),not-null),
usersUsername(varchar(128),not-null),
usersEmail(varchar(128),not-null),
usersPwd(varchar(128),not-null),
ISP(varchar(256),not-null),
last_upload(varchar(128),null),
profile_img(varchar(128),null)



/***********COLUMNS FOR uploaded_files******************/

number(varchar(64),not-null,primary key,auto-increment)
usersId(int(11),foreign-key-->usersId(users),not-null)
ipAddress(varchar(64),not-null)
method(varchar(16),not-null)
status(varchar(16),not-null)
lat(varchar(64),not-null)
lng(varchar(64),not-null)
content_type(varchar(128),not-null)
load_type(varchar(32),not-null)
startedDateTime(varchar(64),not-null)
day(varchar(4),not-null)
last_modified(varchar(32),not-null)
expires(varchar(32),not-null)

/**********COLUMNS FOR cache-directives ***********/

number(varchar(16),not-null,primary-key,auto-increment),
usersId(varchar(16),not-null),
public(varchar(16),not-null),
private(varchar(16),not-null),
no_cache(varchar(16),not-null),
no_store(varchar(16),not-null),
content_type(varchar(128),not-null)