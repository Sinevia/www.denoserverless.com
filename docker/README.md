docker build -t deno .

docker run -d -p 32452:80 --name deno deno

localhost:32452


docker run -d -p 32452:80 -v $(dirname $(pwd)):/app --name deno deno

docker exec -it deno bash