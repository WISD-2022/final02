系統功能<br>
訪客:<br>
查看主頁<br>
查詢房型<br>
查看房型頁面<br>
註冊會員<br>
登入會員<br>
會員:<br>
編輯基本資料<br>
訂購房間<br>
登出會員<br>
管理人員:<br>
新增房型<br>
刪除房型<br>
修改房型<br>
查看房間訂單<br>
修改訂單狀態<br>
網站安裝(系統復原步驟)<br>
複製 https://github.com/WISD-2022/final02.git 本系統在GitHub的專案<br>
打開 Source tree，點選 Clone 後，輸入以下資料Source Path:https://github.com/WISD-2022/final02.git Destination Path:C:\wagon\uwamp\www\final02 打開cmder，切換至專案所在資料夾，cd final02<br>
在cmder輸入以下命令，以復原此系統：<br>
composer install<br>
composer run‐script post‐root‐package‐install<br>
composer run‐script post‐create‐project‐cmd<br>
npm install<br>
npm run build<br>
將專案打開 在.env檔案內輸入資料庫主機IP、Port、名稱、與帳密如下：：<br>
DB_HOST=127.0.0.1<br>
DB_PORT=33060<br>
DB_DATABASE=final02<br>
DB_USERNAME=root<br>
DB_PASSWORD=root<br>
復原完，建立資料庫<br>
先進Adminer建立final02的資料庫<br>
建立好之後開啟cmder輸入以下指令： artisan migrate(成功執行後會復原所有資料表)<br>
進入adminer<br>
資料庫系統:MYSQL<br>
伺服器:localhost:33060<br>
帳號:root<br>
密碼:root<br>
在UwAmp下，點選Apache config，選擇port 8000 ，並在Document Root 輸入{DOCUMENTPATH}/final02/public<br>
