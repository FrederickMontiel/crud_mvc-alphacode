create schema contacts;

create table contact
(
    coct_id_contact      int auto_increment
        primary key,
    coct_name            varchar(30)  null,
    coct_last_name       varchar(50)  null,
    coct_age             int          null,
    coct_email           varchar(50)  null,
    coct_description     text         null,
    coct_url_img_profile varchar(100) null
)
    engine = InnoDB;


