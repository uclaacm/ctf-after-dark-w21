FROM node:14.3.0

WORKDIR /home/node/app

COPY package*.json index.js ./
COPY ./src ./src

RUN npm ci

EXPOSE 3000
CMD npm start