## 系統功能圖片連結網頁 點進去查看 https://imgur.com/a/mbMxikm 
此連結經檢測無毒，請放心前往
# 系統主要功能<br>
## 訪客:<br>
查看主頁<br>
查詢房間<br>
查看房間頁面<br>
註冊會員<br>
登入會員<br>
## 會員:<br>
訂購房間<br>
登出會員<br>
## 管理人員:<br>
新增房間<br>
刪除房間<br>
修改房間<br>
查看房間訂單<br>
取消訂單<br>

## 訪客:
- 查看主頁<br>
Route::get('/', [HomeController::class, 'index'])->name('home.index');
- 查詢房間<br>
Route::get('search', [RoomController::class, 'search'])->name('rooms.search');
- 查看房間頁面<br>
Route::get('rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
- 註冊會員<br>
Route::get('register', [RegisteredUserController::class, 'create']);<br>
Route::post('register', [RegisteredUserController::class, 'store']);
- 登入會員<br>
Route::get('login', [AuthenticatedSessionController::class, 'create']);<br>
Route::post('login', [AuthenticatedSessionController::class, 'store']);

## 會員:
- 訂購房間<br>
Route::get('orders/create/{id}', [OrderController::class, 'create']);<br>
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
- 登出會員<br>
Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);

## 管理人員:
- 查看所有房間<br>
Route::get('rooms', [RoomController::class, 'index'])->name('rooms.index');
- 新增房間<br>
Route::get('rooms/create', [RoomController::class, 'create'])->name('rooms.create');<br>
Route::post('rooms, [RoomController::class, 'store'])->name('rooms.store');
- 刪除房間<br>
Route::delete('rooms/{room}', [RoomController::class, 'destroy']) ->name('rooms.destroy');
- 修改房間<br>
Route::get('rooms/{room}/edit', [RoomController::class, 'edit']) ->name('rooms.edit');<br>
Route::patch('rooms/{room}', [RoomController::class, 'update']) ->name('rooms.update');
- 查看房間訂單<br>
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
- 取消訂單<br>
Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy);




## 還原專案步驟
1. 複製 https://github.com/WISD-2022/final02.git本系統在GitHub的專案
- **打開 Source tree，點選 Clone 後，輸入以下資料Source Path:https://github.com/WISD-2022/final02.git Destination Path:C:\wagon\uwamp\www\final02 打開cmder，切換至專案所在資料夾，cd final02**

2. 在cmder輸入以下命令，以復原此系統：
- **composer install**
- **composer run‐script post‐root‐package‐install**
- **composer run‐script post‐create‐project‐cmd** 
- **npm install** 
- **npm run build** 
3. 將專案打開 在.env檔案內輸入資料庫主機IP、Port、名稱、與帳密如下：：
- **DB_HOST=127.0.0.1**
- **DB_PORT=33060**
- **DB_DATABASE=final02**
- **DB_USERNAME=root**
- **DB_PASSWORD=root**

4. 復原完，建立資料庫
- **先進Adminer建立final02的資料庫**
- **將本系統資料庫匯入 在database資料夾底下的sql檔案**

5. 進入adminer
- **資料庫系統:MYSQL**
- **伺服器:localhost:33060**
- **帳號:root**
- **密碼:root**
6. 在UwAmp下，點選Apache config，選擇port 8000 ，並在Document Root 輸入{DOCUMENTPATH}/final02/public

## 系統開發人員
* [3A932051 鄭羽庭](http://github.com/3A932051)
* [3A932004 賴妤典](http://github.com/3A932004)
## 系統規劃工作
* 訪客:
* 查看主頁          3A932051鄭羽庭
* 查詢房型          3A932051鄭羽庭
* 查看房型頁面   3A932051鄭羽庭
* * 會員:
* 訂購房間           3A932004賴妤典    
* 管理人員:
* 新增房型          3A932004賴妤典
* 刪除房型          3A932004賴妤典
* 修改房型          3A932004賴妤查看房間訂單   3A932051鄭羽庭
* 修改訂單狀態   3A932051鄭羽庭
## 期末系統功能設計分配
* 訪客:
* 查看主頁          3A932051鄭羽庭
* 查詢房型          3A932051鄭羽庭
* 查看房型頁面   3A932051鄭羽庭
* 會員:
* 訂購房間           3A932004賴妤典
* 管理人員:
* 新增房型           3A932004賴妤典
* 刪除房型           3A932004賴妤典
* 修改房型           3A932004賴妤典
* 查看房間訂單    3A932051鄭羽庭
* 修改訂單狀態    3A932051鄭羽庭
* 資料庫
* 資料表欄位設計 3A932004賴妤典
* 關聯式綱要圖3A932004賴妤典
* ERD                  3A932051鄭羽庭
