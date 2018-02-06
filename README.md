# 3DGUNDAM Community


## Development
```
docker-compose up --build
```


## Deploy
```
env (dockerenv productionvm) docker-compose up --build -d
```


## Git
- show 3dg changes: `git log original..`
- update eso:
  1. `git remote add upstream https://github.com/esotalk/esoTalk.git`
  2. `git fetch upstream`
  3. `git merge --no-ff upstream/develop`


## TODO

### Social
- weibo login
- weixin login(scan?)
- dA account
- pixiv account


favicon
svg logo
