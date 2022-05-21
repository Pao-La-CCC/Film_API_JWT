FROM node:15.13-alpine

WORKDIR /frontend

COPY package*.json ./

COPY . .

RUN npm install

EXPOSE 3000

CMD ["npm", "start"]