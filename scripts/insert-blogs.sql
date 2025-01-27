INSERT INTO blog_posts (title, description, markdown, created_at, updated_at)
VALUES
    ('Blog Post Test', 'Testing real markdown and an image', pg_read_file('/tmp/blog-test.md'), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
