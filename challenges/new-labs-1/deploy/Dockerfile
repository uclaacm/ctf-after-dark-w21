FROM node:14
WORKDIR /home/src/app
COPY ./ ./
COPY .env ./
RUN npm ci
EXPOSE 3000
CMD [ "node", "app.js" ]