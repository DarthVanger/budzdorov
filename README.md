# Setup
## Git ftp
```
export FTP_USER=""
export FTP_PASSWORD=""
git config git-ftp.url "h93.hvosting.ua/www/vitalart.com.ua/"
git config git-ftp.user "${FTP_USER}"
git config git-ftp.password "${FTP_PASSWORD}"
git ftp push --dry-run
```
