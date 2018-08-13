# Setup
## Git ftp
```
export FTP_USER=""
export FTP_PASS=""
git config git-ftp.url "h93.hvosting.ua/www/vitalart.com.ua/"
git config git-ftp.user "${FTP_USER}"
git config git-ftp.password "${FTP_PASS}"
git config git-ftp.syncroot .
git ftp show
git ftp push --dry-run
```
# How to
## Show/hide vacation header overlay
```
vim catalog/view/theme/nature/template/common/header.tpl
```
 - Search for "vacation"
 - Uncomment, update dates
 - Commit
 - `git ftp push --dry-run`
