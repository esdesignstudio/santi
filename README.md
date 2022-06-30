# docker nuxt / wordpress rest api

## 安裝步驟

1. 到 .env 檔設定基本環境
2. docker-compose up -d
3. cd nuxt-app
4. yarn && yarn dev
5. 專案啟動在 
    nuxt localhost:3000,
    wordpress localhost:9000/wp-admin

## .sh 檔案說明

1. `dump.sh`：將 docker VM 的 DB 資料匯出至 `/db/default/wp.sql`

## 前端上傳步驟

1. 壓縮`nuxt-app/`（注意！ 請先將`node-modules/`刪除再壓縮上傳）
2. 於本機終端機輸入command上傳壓縮檔 `scp [本機路徑/nuxt-app.zip] root@[主機IP]:~/`
3. 登入主機，將壓縮檔移至 `/srv/www/bolon-nuxt/`
4. 輸入 `pm2 delete Bolon_prod`
5. 備份 `nuxt-app/` 後，解壓縮`nuxt-app.zip`，解壓縮後刪除`nuxt-app.zip`,`__MACOS`... 等多餘檔案
6. 輸入`cd nuxt-app/` 進入資料夾， 將 `ecosystem.config.js` 以 `/srv/www/bolon-nuxt/ecosystem.config.js` 取代
7. 輸入`pm2 start ecosystem.config.js`

## wp上傳步驟

1. 壓縮主題資料夾`twentytwentytwo/`
2. 於本機終端機輸入command上傳壓縮檔 `scp [本機路徑/twentytwentytwo.zip] root@[主機IP]:~/`
3. 登入主機，將壓縮檔移至 `/srv/www/bolon-nuxt/wordpress/wp-content/themes/`
5. 備份舊主題後，解壓縮`twentytwentytwo.zip`，解壓縮後刪除`twentytwentytwo.zip`,`__MACOS`... 等多餘檔案

## Git Commit Type 規範

1. feat: 新增/修改功能 (feature)。
2. fix: 修補 bug (bug fix)。
3. docs: 文件，增加說明 (documentation)。
4. backup: 備份。EX： SQL檔案
5. data: 資料變化。EX：圖片、固定文案、動態資料
6. style: 格式 (不影響程式碼運行的變動 white-space, formatting, missing semi colons, etc)。
7. refactor: 重構 (既不是新增功能，也不是修補 bug 的程式碼變動)。
8. perf: 改善效能 (A code change that improves performance)。
9. test: 增加測試 (when adding missing tests)。
10. chore: 建構程序或輔助工具的變動 (maintain)。
11. revert: 撤銷回覆先前的 commit 例如：revert: type(scope): subject (回覆版本：xxxx)。


