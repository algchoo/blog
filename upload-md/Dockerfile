# Stage 1: Build
FROM golang:1.23-alpine AS builder

WORKDIR /app
COPY . .

# Build the Go binary
RUN go build -o main .

# Stage 2: Run
FROM alpine:latest

WORKDIR /app

# Copy binary from builder stage
COPY --from=builder /app/main .

# Set up a non-root user for security
RUN adduser -D appuser
USER appuser

# Run the Go binary
CMD ["./main"]
