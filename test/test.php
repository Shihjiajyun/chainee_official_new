<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>區塊鏈課程購物車</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- 自定義 CSS -->
    <link rel="stylesheet" href="css/test.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">
            <i class="fas fa-shopping-cart"></i> 購物車
        </h2>

        <p>
        新會員專屬優惠：NEWUSER2024<br>
        早鳥優惠：EARLY2024<br>
        限時超級優惠：SUPER2024(已經過期)
        </p>

        <div class="row">
            <!-- 左側購物車列表 -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">已選項目</h5>
                    </div>
                    <div class="card-body cart-items-container">
                    </div>
                </div>

                <!-- 加購優惠區塊 -->
                <div class="card mt-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">加購優惠</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- 推薦課程卡片 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <img src="./img/lesson1.jpg" class="card-img-top" alt="推薦課程">
                                    <div class="card-body">
                                        <h6 class="card-title">認知升級篇｜投資加密貨幣懂這些就夠了</h6>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <div>
                                                <span class="text-primary fw-bold">NT$ 12,000</span>
                                                <br>
                                                <small class="text-muted"><del>NT$ 14,500</del></small>
                                            </div>
                                            <button class="btn btn-outline-dark add-to-cart">
                                                <i class="fas fa-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 推薦課程卡片 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <img src="https://chainee.io/wp-content/uploads/2024/09/%E4%B8%BB%E8%A6%96%E8%A6%BA-New.jpg"
                                        class="card-img-top" alt="推薦課程">
                                    <div class="card-body">
                                        <h6 class="card-title">聰明理財Ｘ精準投資 ｜ 揮別窮忙的 5 分鐘高效加密貨幣投資攻略</h6>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <div>
                                                <span class="text-primary fw-bold">NT$ 12,000</span>
                                                <br>
                                                <small class="text-muted"><del>NT$ 14,500</del></small>
                                            </div>
                                            <button class="btn btn-outline-dark add-to-cart">
                                                <i class="fas fa-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 右側訂單明細 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">訂單明細</h5>
                    </div>
                    <div class="card-body">
                        <!-- 折扣碼輸入 -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="請輸入折扣碼" id="couponInput">
                            <button class="btn btn-primary" id="applyCoupon">套用</button>
                        </div>
                        <div id="couponMessage" class="mb-3" style="display: none;"></div>

                        <!-- 價格明細 -->
                        <div class="price-details">

                            <hr>
                            <div class="d-flex justify-content-between fw-bold">
                                <span>折扣後總金額</span>
                                <span class="text-primary">NT$ 22,650</span>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100 mt-4">
                            前往結帳
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- 自定義 JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // 預設折扣碼列表
        const validCoupons = {
            'NEWUSER2024': {
                name: '新會員專屬優惠',
                discount: 500,
                expiryTime: new Date().getTime() + 3600000, // 1小時後過期
                isUsed: false
            },
            'EARLY2024': {
                name: '早鳥優惠',
                discount: 800,
                expiryTime: new Date().getTime() + 7200000, // 2小時後過期
                isUsed: false
            },
            'SUPER2024': {
                name: '限時超級優惠',
                discount: 1200,
                expiryTime: new Date().getTime() - 1800000, // 30分鐘後過期
                isUsed: true
            }
        };

        let currentCoupons = new Map(); // 追踪目前使用的所有折扣碼
        let countdownIntervals = new Map(); // 追踪所有倒數計時器

        // 折扣碼處理
        const couponInput = document.getElementById('couponInput');
        const applyCouponBtn = document.getElementById('applyCoupon');
        const couponMessage = document.getElementById('couponMessage');

        // 更新倒數計時
        function updateCountdown(expiryTime) {
            const now = new Date().getTime();
            const distance = expiryTime - now;

            if (distance < 0) {
                return null;
            }

            const hours = Math.floor(distance / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            return `${hours}小時 ${minutes}分鐘 ${seconds}秒`;
        }

        // 購物車項目管理
        let cartItems = new Map(); // 追踪購物車項目
        let itemCounter = 0; // 用於生成唯一ID

        // 更新購物車總價
        function updateCartTotal() {
            let total = 0;
            cartItems.forEach(item => {
                total += item.price;
            });
            return total;
        }

        // 更新價格明細
        function updatePriceDetails() {
            const priceDetailsDiv = document.querySelector('.price-details');
            const originalPrice = updateCartTotal(); // 使用購物車實際總價

            const originalHtml = `
                <div class="d-flex justify-content-between mb-2">
                    <span>商品小計</span>
                    <span>NT$ ${originalPrice}</span>
                </div>`;

            let couponsHtml = '';
            let totalDiscount = 0;

            // 顯示所有使用中的折扣碼
            currentCoupons.forEach((coupon, code) => {
                couponsHtml += `
                    <div class="d-flex justify-content-between mb-2 text-success align-items-center">
                        <div>
                            <span>折扣碼優惠 <small class="text-primary">${coupon.name}</small></span>
                            <br>
                            <small class="text-muted countdown-text-${code}"></small>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="me-2">-NT$ ${coupon.discount}</span>
                            <button class="btn btn-sm btn-outline-danger remove-coupon" data-code="${code}">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>`;
                totalDiscount += coupon.discount;
            });

            const finalPrice = originalPrice - totalDiscount;

            const finalHtml = `
                ${originalHtml}
                ${couponsHtml}
                <hr>
                <div class="d-flex justify-content-between align-items-center fw-bold">
                    <span>折扣後總金額</span>
                    <div class="text-end">
                        ${totalDiscount > 0 ? `<small class="text-muted d-block"><del>NT$ ${originalPrice}</del></small>` : ''}
                        <span class="text-primary fs-5">NT$ ${finalPrice}</span>
                    </div>
                </div>
                ${totalDiscount > 0 ? `
                <div class="text-end mt-2">
                    <small class="text-success">已為您節省 NT$ ${totalDiscount}</small>
                </div>` : ''}`;

            priceDetailsDiv.innerHTML = finalHtml;

            // 重新綁定移除按鈕事件
            document.querySelectorAll('.remove-coupon').forEach(button => {
                button.addEventListener('click', function() {
                    const code = this.dataset.code;
                    removeCoupon(code);
                });
            });
        }

        // 移除特定折扣碼
        function removeCoupon(code) {
            if (countdownIntervals.has(code)) {
                clearInterval(countdownIntervals.get(code));
                countdownIntervals.delete(code);
            }
            currentCoupons.delete(code);
            updatePriceDetails();
            showCouponMessage(`已移除折扣碼：${code}`, 'info');
        }

        applyCouponBtn.addEventListener('click', function() {
            const couponCode = couponInput.value.trim();

            if (couponCode === '') {
                showCouponMessage('請輸入折扣碼', 'danger');
                return;
            }

            // 檢查是否已經使用過此折扣碼
            if (currentCoupons.has(couponCode)) {
                showCouponMessage('此折扣碼已經使用過了', 'warning');
                return;
            }

            const coupon = validCoupons[couponCode];
            if (!coupon) {
                showCouponMessage('無效的折扣碼', 'danger');
                return;
            }

            const now = new Date().getTime();
            if (now > coupon.expiryTime) {
                showCouponMessage('折扣碼已過期', 'danger');
                return;
            }

            if (coupon.isUsed) {
                showCouponMessage('折扣碼已被使用', 'warning');
                return;
            }

            // 新增折扣碼
            currentCoupons.set(couponCode, coupon);
            updatePriceDetails();

            // 設定倒數計時
            const countdownInterval = setInterval(() => {
                const timeLeft = updateCountdown(coupon.expiryTime);
                if (!timeLeft) {
                    clearInterval(countdownInterval);
                    removeCoupon(couponCode);
                    showCouponMessage(`折扣碼 ${couponCode} 已過期`, 'danger');
                } else {
                    const countdownText = document.querySelector(
                        `.countdown-text-${couponCode}`);
                    if (countdownText) {
                        countdownText.textContent = `將於 ${timeLeft} 後過期`;
                    }
                }
            }, 1000);

            countdownIntervals.set(couponCode, countdownInterval);
            showCouponMessage('折扣碼套用成功！', 'success');
            couponInput.value = ''; // 清空輸入框
        });

        // 創建購物車項目 HTML
        function createCartItem(title, price, itemId, imgSrc) {
            return `
                <div class="cart-item d-flex align-items-center mb-3 p-3 border rounded" data-item-id="${itemId}">
                    <img src="${imgSrc}" class="cart-item-img" alt="課程圖片">
                    <div class="ms-3 flex-grow-1">
                        <h5 class="mb-1">${title}</h5>
                        <div class="text-primary fw-bold">NT$ ${price}</div>
                    </div>
                    <button class="btn btn-outline-danger remove-item-btn" data-item-id="${itemId}">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
            `;
        }

        // 加入購物車事件處理函數
        function handleAddToCart(button) {
            const card = button.closest('.card');
            const title = card.querySelector('.card-title').textContent.trim();

            if (isItemInCart(title)) {
                showCouponMessage('此商品已在購物車中', 'warning');
                return;
            }

            const priceText = card.querySelector('.text-primary').textContent;
            const price = parseInt(priceText.replace(/[^0-9]/g, ''));
            const imgSrc = card.querySelector('img').src;
            const itemId = `item_${++itemCounter}`;

            cartItems.set(itemId, {
                title: title,
                price: price,
                imgSrc: imgSrc
            });

            const cartItem = createCartItem(title, price, itemId, imgSrc);
            const cartContainer = document.querySelector('.cart-items-container');
            if (cartContainer) {
                cartContainer.insertAdjacentHTML('beforeend', cartItem);
                updatePriceDetails();
                bindRemoveButton(itemId, card);
                updateCartButton(card, true);
                showCouponMessage('成功加入購物車！', 'success');
                const newItem = document.querySelector(`[data-item-id="${itemId}"]`);
                newItem.style.animation = 'slideIn 0.3s ease-out';
            }
        }

        // 更新按鈕狀態
        function updateCartButton(card, isInCart) {
            const button = card.querySelector('.add-to-cart, .in-cart');
            if (isInCart) {
                button.classList.remove('btn-outline-dark', 'add-to-cart');
                button.classList.add('btn-secondary', 'in-cart');
                button.disabled = true;
                button.innerHTML = '<i class="fas fa-check"></i> 已加入購物車';
            } else {
                button.classList.remove('btn-secondary', 'in-cart');
                button.classList.add('btn-outline-dark', 'add-to-cart');
                button.disabled = false;
                button.innerHTML = '<i class="fas fa-cart-plus"></i>';
            }
        }

        // 綁定刪除按鈕事件
        function bindRemoveButton(itemId, originalCard) {
            const removeBtn = document.querySelector(`button[data-item-id="${itemId}"]`);
            removeBtn.addEventListener('click', function() {
                const cartItem = document.querySelector(`div[data-item-id="${itemId}"]`);
                const item = cartItems.get(itemId);

                cartItem.style.animation = 'slideOut 0.3s ease-out';
                cartItem.addEventListener('animationend', function() {
                    cartItem.remove();
                    cartItems.delete(itemId);
                    updatePriceDetails();

                    if (originalCard) {
                        updateCartButton(originalCard, false);
                        // 重新綁定加入購物車事件
                        const addButton = originalCard.querySelector('.add-to-cart');
                        if (addButton) {
                            addButton.addEventListener('click', function() {
                                handleAddToCart(this);
                            });
                        }
                    } else {
                        const cards = document.querySelectorAll('.card');
                        cards.forEach(card => {
                            const cardTitle = card.querySelector('.card-title');
                            if (cardTitle && cardTitle.textContent.trim() === item.title
                                .trim()) {
                                updateCartButton(card, false);
                                // 重新綁定加入購物車事件
                                const addButton = card.querySelector('.add-to-cart');
                                if (addButton) {
                                    addButton.addEventListener('click', function() {
                                        handleAddToCart(this);
                                    });
                                }
                            }
                        });
                    }

                    showCouponMessage('商品已從購物車移除！', 'info');
                });
            });
        }

        // 檢查商品是否在購物車中
        function isItemInCart(title) {
            let found = false;
            cartItems.forEach(item => {
                console.log('Comparing:', item.title, 'with:', title); // 用於調試
                if (item.title.trim() === title.trim()) {
                    found = true;
                }
            });
            return found;
        }

        // 添加新的 CSS 樣式
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { opacity: 0; transform: translateX(-20px); }
                to { opacity: 1; transform: translateX(0); }
            }
            @keyframes slideOut {
                from { opacity: 1; transform: translateX(0); }
                to { opacity: 0; transform: translateX(20px); }
            }
            
            .in-cart {
                cursor: not-allowed;
                opacity: 0.8;
            }
            
            .in-cart i {
                margin-right: 5px;
            }
        `;
        document.head.appendChild(style);

        // 顯示折扣碼訊息
        function showCouponMessage(message, type) {
            couponMessage.textContent = message;
            couponMessage.className = `alert alert-${type}`;
            couponMessage.style.display = 'block';
        }

        // 初始化價格明細
        updatePriceDetails();

        // 初始綁定所有加入購物車按鈕
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', function() {
                handleAddToCart(this);
            });
        });
    });
    </script>
</body>

</html>