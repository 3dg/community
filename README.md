# 3DGUNDAM Community


## Development
```
docker-compose up --build
```


## Deploy
```
rsync -azP . [host]:3dgundam
ssh [host]
cd 3dgundam
docker-compose up --build -d
```


## Git
- show 3dg changes: `git log original..`
- update eso:
  1. `git remote add upstream https://github.com/esotalk/esoTalk.git`
  2. `git fetch upstream`
  3. `git merge --no-ff upstream/develop`


## Update images domain
```sql
UPDATE et_post SET content = REPLACE(content, '//rx-78.b0.upaiyun.com/', '//3dgundam.yizidesign.com/') WHERE INSTR(content, '//rx-78.b0.upaiyun.com/') > 0;
```


## TODO

### Social
- weibo login
- weixin login(scan?)
- dA account
- pixiv account


favicon
svg logo
