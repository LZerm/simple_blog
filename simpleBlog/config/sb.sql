set default_storage_engine = InnoDB;
set character_set_client = utf8;
set character_set_connection = utf8;
set character_set_database = utf8;
set character_set_results = utf8;
set character_set_server = utf8;

create database simpleBlog;

use simpleBlog;

-- 管理员表
create table administrator (
	admin_id int auto_increment primary key,
	admin_name char(20) not null,
	admin_password char(30)
);

-- 用户表
create table user (
	user_id int auto_increment primary key,
	user_name char(20) not null,
	user_password char(30),
	article_count int default 0,  -- 文章数量
	like_count int default 0,     -- 收获的赞数量
	focus_count  int  default 0     -- 关注的作者数量
);

--分类表
create table category (
	category_id int auto_increment primary key,
	category_name char(20) not null
);

-- 文章表
create table article (
	article_id int auto_increment primary key,
	user_id int,
	article_title char(100) not null,
	article_content text,
	publish_time datetime,
	clicked int default 0,      -- 点击量
	beliked int default 0,      -- 赞数
	category_id int ,           -- 文章分类

	constraint FK_article_user foreign key(user_id) references user(user_id),
	constraint FK_article_category foreign key(category_id) references category(category_id)

);

-- 评论表
create table comment (
	comment_id int auto_increment primary key,
	article_id int,             -- 文章的id
	commenter_id int,           -- 评论者的id
	be_commenter_id int,        -- 被评论者的id
	comment_content text,
	publish_time datetime,
	constraint FK_comment_article foreign key(article_id) references article(article_id)

);	

-- 草稿表
create table manuscript (
	manuscript_id char(30),      -- 草稿id用作者的id加上时间组成字符串【类型强制转换】
	user_id int,
	manuscript_title char(100),
	manuscript_content text,
	constraint FK_manuscript_user foreign key(user_id) references user(user_id)

);

insert into administrator values(null,'admin','admin')