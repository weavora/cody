# MySQL code conventions

## Basics

1. We're using InnoDB engine by default
2. We're using `utf8` encoding and `utf8_bin` collocation by default for text types

## Table names

1. All table names should be lowercased and use underscore(_) as a separator

   `articles`, `article_tags`
   
2. Tables should have names in plural 

   `users`, `user_profiles`
   
3. We __DON'T USE__ any magical abbrs and shortcuts 
   
   WRONG: `users2tags`, `user_img`, `kw_repl`

   RIGHT: `user_tags`,`user_images`,`keyword_replacements`

## Column names

1. All column names should be lowercased and use underscore(_) as a separator

  `id`, `first_name`
  
2. Columns should have names in singular
   
   `name`,`file`,`local_path`

3. We __DON'T USE__ any magical abbrs and shortcuts 

  WRONG: `img`, `pc`, `articles_num`, 
  
  RIGHT: `image`,`percentage`,`articles_count`
  
  Exceptions: `id`
  
4. We __DON'T USE__ table name prefixes or any others 

  WRONG: `users.user_name`,`articles.article_title`
  
  RIGHT: `users.name`,`articles.title`
  
5. All boolean columns should start with `is_` or `has_` 
   
  WRONG: `editable`, `tags`, 

  RIGHT: `is_editable`, `has_tags`
  
6. All date columns __related to performed actions__ should have an `_at` or `_on` postfix: 
  
  WRONG: `creation_date`, `last_login_time`, 
  
  RIGHT: `created_at`, `last_login_at`

7. Foreign key columns should match the `<singular_foreign_table_name>_<foreign_primary_key>` pattern 

  WRONG: `articles.user`, `products.category`, 
  
  RIGHT: `articles.user_id` for `users.id`, `products.category_code` for `categories.code`

## Keys/indexes naming

It's important to keep foreign key names unique across the database. 
To met this requirement, we name foreign keys like `<origin_table>_<column_name_related_to_foreign_table>`.

WRONG: `products.users_idx`, `articles.author`, `post_tags.tag_id`, 

RIGHT: `products.products_user_id`, `articles.articles_author_id`, `post_tags_tag_id`

Index names are not shared across the database and we have no rules for index names.
But it's __important__ to specify an index name manually and not to use mysql index name auto generation, because to modify this index, you will need to guess the generated index name.

## Column types

1. For `boolean` columns use `TINYINT(1) UNSIGNED NOT NULL DEFAULT 0`
2. For `datetime` columns use `DATETIME`
3. Don't use timestamps

## TODO

1. ENUM usage
2. BIT usage
