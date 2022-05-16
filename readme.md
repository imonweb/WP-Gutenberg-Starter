## Gutenberg-Blocks



### Dependencies
```JavaScript
   master   npm i -D @wordpress/scripts
   master   npm install @wordpress/i18n
   master   npm install @wordpress/blocks
```


### Package.json
```JavaScript
  "scripts": {
    "start": "wp-scripts start",
    "build": "wp-scripts build",
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "devDependencies": {
    "@wordpress/scripts": "^23.0.0"
  },
  "dependencies": {
    "@wordpress/blocks": "^11.7.0",
    "@wordpress/i18n": "^4.8.0"
  }
```

## To run:
```JavaScript
 master   npm run start
```