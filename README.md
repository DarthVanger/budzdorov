# Setup
## Git ftp
```
export FTP_USER=""
export FTP_PASS=""
git config git-ftp.url "h93.hvosting.ua/www/vitalart.com.ua/"
git config git-ftp.user "${FTP_USER}"
git config git-ftp.password "${FTP_PASS}"
git ftp push --dry-run
```
