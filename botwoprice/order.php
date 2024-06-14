<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>不二價屋 - 下單頁面</title>
    <link rel="icon" href="home.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=LXGW+WenKai+Mono+TC&family=Noto+Serif+TC:wght@200..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_mouse.css">
    <link rel="stylesheet" href="style_title.css">
    <style>
        body {
            font-family: 'LXGW WenKai Mono TC', 'Noto Serif TC', serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .container:hover {
            transform: scale(1.02);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: #28a745;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .form-group button:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .form-group button:disabled {
            background-color: #ccc;
        }
        .order-summary {
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .order-summary .item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .order-summary .item:last-child {
            border-bottom: none;
        }
        .order-summary .total {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            margin-top: 10px;
            font-weight: bold;
            font-size: 1.2em;
        }
        .order-summary .total div:last-child {
            color: #28a745;
        }
    </style>
</head>
<body>
    <nav>
        <div class="menu">
            <div class="logo">
                <a href="#">不二價屋</a>
            </div>
            <ul>
                <li><a href="index.php">首頁</a></li>
                <li><a href="#" id="nav-cart" class="icon-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span>0</span>
                </a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1>訂單確認頁面</h1>
        <form id="checkout-form">
            <div class="form-group">
                <label for="memberName">姓名</label>
                <input type="text" id="memberName" name="memberName" required>
            </div>
            <div class="form-group">
                <label for="email">電子郵件</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">電話</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="remarks">備註</label>
                <textarea id="remarks" name="remarks" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="transactionTime">交易時間</label>
                <input type="datetime-local" id="transactionTime" name="transactionTime" required>
            </div>
            <div class="order-summary">
                <h2>訂單摘要</h2>
                <div id="order-content"></div>
                <div class="total">
                    <div>總計:</div>
                    <div id="total-amount">$0</div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit">提交訂單</button>
            </div>
        </form>
    </div>
    <script>
        const checkoutForm = document.getElementById('checkout-form');
        const orderContent = document.getElementById('order-content');
        const totalAmount = document.getElementById('total-amount');
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let products = [];

        const fetchProducts = async () => {
            try {
                const response = await fetch('products.json');
                if (!response.ok) throw new Error('網絡響應不是 ok');
                products = await response.json();
                displayOrderContent();
            } catch (error) {
                console.error('獲取產品失敗:', error);
                orderContent.innerHTML = '<p>無法載入商品資訊。</p>';
            }
        };

        const displayOrderContent = () => {
            orderContent.innerHTML = '';
            let total = 0;
            cart.forEach(item => {
                const product = products.find(p => p.id == item.product_id);
                if (product) {
                    const itemTotal = item.quantity * product.price;
                    total += itemTotal;
                    orderContent.innerHTML += `
                        <div class="item">
                            <div>${product.name} x ${item.quantity}</div>
                            <div>$${itemTotal.toFixed(2)}</div>
                        </div>
                    `;
                }
            });
            totalAmount.textContent = `$${total.toFixed(2)}`;
        };

        checkoutForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(checkoutForm);
            const orderDetails = {
                memberName: formData.get('memberName'),
                email: formData.get('email'),
                phone: formData.get('phone'),
                remarks: formData.get('remarks'),
                transactionTime: formData.get('transactionTime'),
                totalAmount: parseFloat(totalAmount.textContent.replace('$', '')),
                cart: cart.map(item => {
                    const product = products.find(p => p.id == item.product_id);
                    return {
                        productName: product.name,
                        productPrice: product.price,
                        quantity: item.quantity,
                        total: product.price * item.quantity
                    };
                })
            };

            try {
                const response = await fetch('process_order.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(orderDetails)
                });
                const result = await response.json();
                if (result.success) {
                    alert('訂單已提交！');
                    localStorage.removeItem('cart');
                    window.location.href = 'index.php';
                } else {
                    alert('提交訂單時出錯，請稍後重試。');
                }
            } catch (error) {
                console.error('錯誤:', error);
                alert('提交訂單時出錯，請稍後重試。');
            }
        });

        fetchProducts();
    </script>
</body>
</html>
