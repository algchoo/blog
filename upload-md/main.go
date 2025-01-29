package main

import (
	"context"
	"fmt"
	"log"
	"net/http"
	"os"

	"github.com/gin-gonic/gin"
	"github.com/jackc/pgx/v5/pgxpool"
)

type BlogPost struct {
	Title       string `json:"title" binding:"required"`
	Description string `json:"description" binding:"required"`
	Markdown    string `json:"markdown" binding:"required"`
}

func main() {
	pg_user := os.Getenv("POSTGRES_USER")
	pg_password := os.Getenv("POSTGRES_PASSWORD")
	pg_database := os.Getenv("POSTGRES_DB")
	pg_port := os.Getenv("DB_PORT")
	pg_host := os.Getenv("DB_HOST")
	http_port := "8080"

	dsn := fmt.Sprintf("postgres://%s:%s@%s:%s/%s", pg_user, pg_password, pg_host, pg_port, pg_database)

	// Initialize PostgreSQL connection pool
	dbpool, err := pgxpool.New(context.Background(), dsn)
	if err != nil {
		log.Fatalf("Unable to connect to database: %v\n", err)
	}
	defer dbpool.Close()

	// Set up the Gin router
	router := gin.Default()

	// Define the POST route
	router.POST("/posts", func(c *gin.Context) {
		var post BlogPost

		// Bind JSON payload to BlogPost struct
		if err := c.ShouldBindJSON(&post); err != nil {
			c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
			return
		}

		// Insert into the database
		query := `INSERT INTO blog_posts (title, description, markdown, created_at, updated_at) VALUES ($1, $2, $3, $4, $5)`
		_, err := dbpool.Exec(context.Background(), query, post.Title, post.Description, post.Markdown)
		if err != nil {
			log.Printf("Error inserting post: %v\n", err)
			c.JSON(http.StatusInternalServerError, gin.H{"error": "Failed to save post"})
			return
		}

		// Respond with success
		c.JSON(http.StatusOK, gin.H{"message": "Post created successfully"})
	})

	// Start the HTTP server
	log.Printf("Starting server on port %s...", http_port)
	router.Run(":" + http_port)
}
