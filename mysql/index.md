# MySQL code conventions

## Basics

1. We're using InnoDB engine by default
2. We're using `utf8` encoding and `utf8_bin` collocation by default for text types

## Table names

1. All table names should be lowercased and use underscore(_) as separator

   `articles`, `article_tags`
   
2. Tables should have plural name 

   `users`, `user_profiles`
3. We __DONT USE__ any magical abbrs and shortcuts 
   
   WRONG: `users2tags`, `user_img`, `kw_repl`

   RIGHT: `user_tags`,`user_images`,`keyword_replacement`

## Column names

1. All column names should be lowercased and use underscore(_) as separator

  `id`, `first_name`
  
2. Columns should have singular name
   
   `name`,`file`,`local_path`

3. We __DONT USE__ any magical abbrs and shortcuts 

  WRONG: `img`, `pc`, `articles_num`, 
  
  RIGHT: `image`,`percentage`,`articles_count`
  
  Exceptions: `id`
  
4. We __DONT USE__ table name prefixes either any others 

  WRONG: `users.user_name`,`articles.article_title`
  
  RIGHT: `users.name`,`articles.title`
  
5. All boolean columns should start with `is_` or `has_` 
   
  WRONG: `editable`, `tags`, 

  RIGHT: `is_editable`, `has_tags`
  
6. All date columns __related to performed actions__ should have `_at` or `_on` postfix: 
  
  WRONG: `creation_date`, `last_login_time`, 
  
  RIGHT: `created_at`, `last_login_at`

7. Foreign key columns should match `<foreign_table>_<foreign_column>` pattern 

  WRONG: `article.user`, `product.category`, 
  
  RIGHT: `article.user_id`, `product.category_code`

## Keys/indexes naming

It's important to keep foreign key names unique across database. 
To met this requirement we name foreign keys like `<origin_table>_<foreign_table>_<foreign_column>`.

WRONG: `product.user_idx`, `article.author`, `post_tags.tag_id`, 

RIGHT: `product.product_user_id`, `article.article_author_id`, `post_tag_tag_id`

Indexes names doesn't shared across database and we have no some rules for index names.
But it's __important__ to specify index name manually and don't use mysql index name auto generation, because to modify this index you will need to guess generated index name.

## Column types

1. For `boolean` columns use `TINYINT(1) UNSIGNED NOT NULL DEFAULT 0`
2. For `datetime` columns use `DATETIME`
3. Don't use timestamps

## TODO

1. ENUM usage
2. BIT usage
