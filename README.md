**TÓM TẮT CHI TIẾT NỘI DUNG ÔN THI LẬP TRÌNH WEB**

**I. HTML & CSS**

*   **HTML (HyperText Markup Language):**
    *   **Mục đích:** Ngôn ngữ đánh dấu dùng để tạo cấu trúc và nội dung cho trang web.
    *   **Cấu trúc cơ bản của một tài liệu HTML:**
        *   `<!DOCTYPE html>`: Khai báo loại tài liệu, cho trình duyệt biết đây là HTML5.
        *   `<html>`: Phần tử gốc, bao bọc toàn bộ nội dung trang.
        *   `<head>`: Chứa thông tin meta (siêu dữ liệu) về trang, không hiển thị trực tiếp.
            *   `<meta charset="UTF-8">`: Khai báo bộ mã ký tự (quan trọng để hiển thị tiếng Việt).
            *   `<title>Tiêu đề trang web</title>`: Hiển thị trên tab trình duyệt và quan trọng cho SEO.
            *   `<link rel="stylesheet" href="styles.css">`: Liên kết đến file CSS bên ngoài.
            *   `<script src="script.js"></script>`: Liên kết đến file JavaScript (thường đặt ở cuối `<body>` để tối ưu tải trang).
            *   `<meta name="viewport" content="width=device-width, initial-scale=1.0">`: Quan trọng cho Responsive Web Design.
        *   `<body>`: Chứa toàn bộ nội dung hiển thị của trang web.
    *   **Các thẻ HTML thường dùng:**
        *   **Văn bản & Cấu trúc:**
            *   `<h1>` đến `<h6>`: Tiêu đề các cấp, `<h1>` quan trọng nhất.
                *   Ví dụ: `<h1>Đây là tiêu đề chính</h1><h2>Đây là tiêu đề phụ</h2>`
            *   `<p>`: Đoạn văn.
                *   Ví dụ: `<p>Một đoạn văn bản mô tả nội dung.</p>`
            *   `<br>`: Ngắt dòng (không nên lạm dụng, dùng CSS để kiểm soát khoảng cách tốt hơn).
            *   `<hr>`: Đường kẻ ngang.
            *   `<strong>` hoặc `<b>`: In đậm (strong mang ý nghĩa nhấn mạnh hơn).
            *   `<em>` hoặc `<i>`: In nghiêng (em mang ý nghĩa nhấn mạnh hơn).
            *   `<span>`: Dùng để nhóm các phần tử inline hoặc một phần văn bản để định dạng bằng CSS/JS mà không làm thay đổi cấu trúc.
        *   **Liên kết:**
            *   `<a>`: Tạo siêu liên kết.
                *   `href="URL"`: Đường dẫn đến trang đích.
                    *   Ví dụ: `<a href="https://www.google.com">Đến Google</a>`
                    *   Ví dụ liên kết nội bộ: `<a href="#section2">Đi đến mục 2</a>` (cần có phần tử với `id="section2"`)
                *   `target="_blank"`: Mở link trong tab mới.
        *   **Hình ảnh:**
            *   `<img>`: Chèn hình ảnh.
                *   `src="path_to_image.jpg"`: Đường dẫn đến file ảnh.
                *   `alt="Mô tả hình ảnh"`: Văn bản thay thế khi ảnh không tải được (quan trọng cho SEO và accessibility).
                *   `width=".."`, `height=".."`: Kích thước ảnh (nên dùng CSS để kiểm soát).
                    *   Ví dụ: `<img src="logo.png" alt="Logo công ty" width="100">`
        *   **Danh sách:**
            *   `<ul>`: Danh sách không có thứ tự (dấu chấm đầu dòng).
            *   `<ol>`: Danh sách có thứ tự (số hoặc chữ cái).
            *   `<li>`: Phần tử trong danh sách.
                *   Ví dụ: `<ul><li>Táo</li><li>Cam</li></ul>`
            *   `<dl>`, `<dt>`, `<dd>`: Danh sách định nghĩa (thuật ngữ và mô tả).
        *   **Bảng:**
            *   `<table>`: Tạo bảng.
            *   `<tr>`: Hàng trong bảng.
            *   `<th>`: Ô tiêu đề của bảng (mặc định in đậm, căn giữa).
            *   `<td>`: Ô dữ liệu của bảng.
            *   `colspan`, `rowspan`: Gộp ô theo cột/hàng.
                *   Ví dụ: `<table><tr><th>Tên</th><th>Tuổi</th></tr><tr><td>An</td><td>20</td></tr></table>`
        *   **HTML5 Semantic Elements:** Cung cấp ý nghĩa rõ ràng hơn cho cấu trúc trang.
            *   `<header>`: Phần đầu trang (logo, navigation).
            *   `<footer>`: Phần cuối trang (thông tin bản quyền, liên hệ).
            *   `<nav>`: Chứa các liên kết điều hướng chính.
            *   `<article>`: Một mẩu nội dung độc lập, hoàn chỉnh (bài viết blog, tin tức).
            *   `<section>`: Một nhóm nội dung có chủ đề liên quan.
            *   `<aside>`: Nội dung phụ, sidebar.
        *   **HTML5 Media:**
            *   `<video>`: Nhúng video. Thuộc tính: `src`, `controls`, `autoplay`, `loop`, `width`, `height`, `poster`.
            *   `<audio>`: Nhúng âm thanh. Thuộc tính: `src`, `controls`, `autoplay`, `loop`.
    *   **Forms (Biểu mẫu):** Dùng để thu thập dữ liệu từ người dùng.
        *   `<form action="url_xử_lý_dữ_liệu.php" method="GET/POST">`:
            *   `action`: URL của script sẽ xử lý dữ liệu form.
            *   `method`: `GET` (dữ liệu gửi qua URL, hiển thị, giới hạn độ dài) hoặc `POST` (dữ liệu gửi ngầm, an toàn hơn, không giới hạn).
        *   `<input>`: Phần tử nhập liệu chính.
            *   `type="text"`: Ô nhập văn bản.
            *   `type="password"`: Ô nhập mật khẩu (hiển thị dấu *).
            *   `type="radio"`: Nút chọn một trong nhiều (cùng `name`).
            *   `type="checkbox"`: Hộp kiểm (chọn nhiều).
            *   `type="submit"`: Nút gửi form.
            *   `type="reset"`: Nút xóa dữ liệu đã nhập.
            *   `type="button"`: Nút thường (cần JS để xử lý).
            *   `type="file"`: Chọn file để upload.
            *   `type="hidden"`: Trường ẩn, không hiển thị nhưng vẫn gửi dữ liệu.
            *   `name="ten_truong"`: Tên của trường dữ liệu (quan trọng để PHP/JS lấy dữ liệu).
            *   `value="gia_tri"`: Giá trị mặc định hoặc giá trị của nút radio/checkbox.
            *   `placeholder="Gợi ý"`: Văn bản gợi ý trong ô input.
            *   `required`: Bắt buộc nhập.
        *   `<textarea name="mo_ta" rows="4" cols="50"></textarea>`: Ô nhập văn bản nhiều dòng.
        *   `<select name="thanh_pho">`: Tạo danh sách thả xuống.
            *   `<option value="hcm">Hồ Chí Minh</option>`
            *   `<option value="hn" selected>Hà Nội</option>` (`selected` để chọn mặc định).
        *   `<label for="ten_input_id">Nhãn:</label>`: Nhãn cho phần tử input (click vào label sẽ focus vào input có `id` tương ứng).
        *   `<button type="submit/reset/button">Nội dung nút</button>`: Tương tự `<input type="button/submit/reset">` nhưng linh hoạt hơn về nội dung.
        *   HTML5 Form Input Types: `email`, `url`, `number`, `date`, `range`, `color`, ... (có validation cơ bản từ trình duyệt).

*   **CSS (Cascading Style Sheets):**
    *   **Mục đích:** Định dạng và tạo kiểu cho các phần tử HTML, tách biệt phần trình bày khỏi nội dung.
    *   **Cách nhúng CSS:**
        *   **Inline:** `style` attribute trực tiếp trong thẻ HTML. Ít dùng vì khó quản lý.
            *   Ví dụ: `<p style="color: blue; font-size: 16px;">Đoạn văn màu xanh.</p>`
        *   **Embedded (Internal):** Thẻ `<style>` trong phần `<head>`. Dùng cho một trang HTML duy nhất.
            *   Ví dụ: `<head><style> p { color: green; } </style></head>`
        *   **External:** File `.css` riêng biệt, liên kết bằng thẻ `<link>` trong `<head>`. *Cách tốt nhất, dễ quản lý và tái sử dụng.*
            *   Ví dụ: `<link rel="stylesheet" type="text/css" href="style.css">`
    *   **Cú pháp một Rule CSS:** `selector { property: value; property2: value2; ... }`
        *   `selector`: Chọn phần tử HTML để áp dụng style (ví dụ: `p`, `.my-class`, `#my-id`).
        *   `property`: Thuộc tính CSS muốn thay đổi (ví dụ: `color`, `font-size`).
        *   `value`: Giá trị cho thuộc tính đó (ví dụ: `red`, `14px`).
    *   **CSS Selectors (quan trọng):**
        *   **Basic Selectors:**
            *   `element` (ví dụ: `h1`, `p`, `div`): Chọn tất cả các thẻ cùng loại.
            *   `.class` (ví dụ: `.highlight`): Chọn các thẻ có class đó. Một thẻ có thể có nhiều class, nhiều thẻ có thể cùng class.
            *   `#id` (ví dụ: `#main-header`): Chọn thẻ có ID đó. ID phải là duy nhất trên trang.
        *   **Combining Selectors:**
            *   `element.class` (ví dụ: `p.intro`): Chọn thẻ `p` có class `intro`.
            *   `element#id` (ví dụ: `div#content`): Chọn thẻ `div` có ID `content`.
            *   `selector1, selector2` (ví dụ: `h1, h2, h3`): Nhóm nhiều selector.
        *   **Relationship Selectors (Hierarchy):**
            *   `ancestor descendant` (ví dụ: `div p`): Chọn tất cả `p` nằm bên trong `div` (bất kể cấp độ).
            *   `parent > child` (ví dụ: `ul > li`): Chọn `li` là con trực tiếp của `ul`.
            *   `element1 + element2` (ví dụ: `h2 + p`): Chọn `p` ngay sau `h2` (cùng cấp).
            *   `element1 ~ element2` (ví dụ: `h2 ~ p`): Chọn tất cả `p` theo sau `h2` (cùng cấp).
        *   **Attribute Selectors:**
            *   `[attribute]` (ví dụ: `a[target]`): Chọn thẻ `a` có thuộc tính `target`.
            *   `[attribute=value]` (ví dụ: `input[type="text"]`): Chọn `input` có `type` là `text`.
            *   `[attribute~=value]` (chứa từ), `[attribute|=value]` (bắt đầu bằng từ), `[attribute^=value]` (bắt đầu bằng chuỗi), `[attribute$=value]` (kết thúc bằng chuỗi), `[attribute*=value]` (chứa chuỗi).
        *   **Pseudo-classes:** Định kiểu cho trạng thái đặc biệt của phần tử.
            *   `:link`, `:visited`, `:hover`, `:active`, `:focus` (thường dùng cho `<a>` và form inputs).
            *   `:first-child`, `:last-child`, `:nth-child(n)`, `:nth-of-type(n)`.
            *   `:not(selector)`.
        *   **Pseudo-elements:** Định kiểu cho một phần cụ thể của phần tử.
            *   `::before`, `::after` (dùng để chèn nội dung).
            *   `::first-line`, `::first-letter`.
    *   **Box Model (Mô hình hộp):** Mỗi phần tử HTML được coi là một cái hộp.
        *   `content`: Nội dung thực của phần tử (text, image).
        *   `padding`: Khoảng đệm giữa content và border (bên trong border).
        *   `border`: Đường viền bao quanh padding và content. (Thuộc tính: `border-width`, `border-style`, `border-color`).
        *   `margin`: Khoảng cách bên ngoài border, giữa phần tử này và các phần tử khác.
        *   `width`, `height`: Kích thước của vùng content (mặc định). Có thể thay đổi bằng `box-sizing: border-box;` để `width`/`height` bao gồm cả padding và border.
    *   **Các thuộc tính CSS thường dùng:**
        *   **Text Formatting:** `color`, `font-family` (nên có fallback fonts), `font-size` (px, em, rem, %), `font-weight` (normal, bold), `font-style` (normal, italic), `text-align` (left, right, center, justify), `text-decoration` (none, underline, line-through), `line-height`, `letter-spacing`, `word-spacing`.
        *   **Backgrounds:** `background-color`, `background-image: url('path');`, `background-repeat` (no-repeat, repeat-x, repeat-y, repeat), `background-position` (top, center, bottom, left, right, hoặc giá trị px, %), `background-size` (cover, contain).
        *   **Layout & Positioning:**
            *   `display`:
                *   `block`: Chiếm toàn bộ chiều rộng, bắt đầu trên dòng mới (ví dụ: `div`, `p`, `h1`).
                *   `inline`: Chỉ chiếm chiều rộng cần thiết, không bắt đầu trên dòng mới (ví dụ: `span`, `a`, `img`). `width`, `height`, `margin-top/bottom` không có tác dụng nhiều.
                *   `inline-block`: Giống inline nhưng có thể set `width`, `height`, `margin`, `padding`.
                *   `none`: Ẩn phần tử.
                *   `flex`, `grid`: Dùng cho layout phức tạp (xem Lab 02).
            *   `float: left | right;` (cẩn thận với `clear: both;` để tránh vỡ layout).
            *   `position`:
                *   `static`: Mặc định.
                *   `relative`: Dịch chuyển so với vị trí bình thường, không ảnh hưởng các phần tử khác.
                *   `absolute`: Dịch chuyển so với phần tử cha gần nhất có `position` không phải `static`. Bị loại khỏi luồng bình thường.
                *   `fixed`: Dịch chuyển so với viewport (cửa sổ trình duyệt), không bị cuộn theo trang.
                *   `sticky`: Kết hợp giữa `relative` và `fixed`.
            *   `top`, `right`, `bottom`, `left`: Dùng với `position` (trừ `static`).
            *   `z-index`: Xác định thứ tự xếp chồng của các phần tử có `position`.
    *   **CSS3 Features:**
        *   `border-radius`: Bo tròn góc. Ví dụ: `border-radius: 10px;`
        *   `box-shadow`: Đổ bóng cho hộp. Ví dụ: `box-shadow: 5px 5px 10px #888888;`
        *   `text-shadow`: Đổ bóng cho chữ.
        *   Gradients: `linear-gradient()`, `radial-gradient()`.
        *   Transitions: Tạo hiệu ứng chuyển động mượt mà khi thuộc tính thay đổi. Ví dụ: `transition: background-color 0.5s ease;`
        *   Animations (`@keyframes`): Tạo hiệu ứng động phức tạp hơn.
    *   **Responsive Web Design:**
        *   **Meta Viewport Tag:** Rất quan trọng, đặt trong `<head>`.
            *   Ví dụ: `<meta name="viewport" content="width=device-width, initial-scale=1.0">`
                *   `width=device-width`: Set chiều rộng viewport bằng chiều rộng thiết bị.
                *   `initial-scale=1.0`: Set mức zoom ban đầu.
        *   **Media Queries:** Áp dụng các CSS rules khác nhau dựa trên đặc điểm của thiết bị (thường là chiều rộng màn hình).
            *   Ví dụ:
                ```css
                /* CSS cho màn hình lớn */
                .container { width: 960px; }

                /* CSS cho màn hình tablet (ví dụ: <= 768px) */
                @media (max-width: 768px) {
                    .container { width: 100%; }
                    .sidebar { display: none; }
                }

                /* CSS cho màn hình mobile (ví dụ: <= 480px) */
                @media (max-width: 480px) {
                    nav ul li { display: block; text-align: center; }
                }
                ```
        *   **Flexible Images/Videos:** Dùng `max-width: 100%; height: auto;` để ảnh/video tự co giãn theo phần tử cha.
        *   **Fluid Grids:** Sử dụng đơn vị tương đối (%) cho layout thay vì pixel cố định.
        *   **Mobile First vs Desktop First Approach:**
            *   Mobile First: Thiết kế cho mobile trước, sau đó dùng media query (`min-width`) để thêm style cho màn hình lớn hơn. (Thường được khuyến khích).
            *   Desktop First: Thiết kế cho desktop trước, sau đó dùng media query (`max-width`) để điều chỉnh cho màn hình nhỏ hơn.
    *   **CSS Frameworks (ví dụ: Bootstrap - Lab 02):** Cung cấp các class CSS và component dựng sẵn để xây dựng giao diện nhanh hơn, responsive. Nên biết khái niệm và cách sử dụng cơ bản (grid system, các component phổ biến).
    *   **Web Inspector (Developer Tools):**
        *   **Elements panel:** Xem cấu trúc HTML (DOM tree), CSS được áp dụng cho từng phần tử, chỉnh sửa HTML/CSS trực tiếp để thử nghiệm.
        *   **Styles pane:** Xem các rule CSS nào đang tác động, rule nào bị ghi đè.
        *   **Computed pane:** Xem giá trị CSS cuối cùng được tính toán cho phần tử.
        *   **Box model visualizer:** Xem trực quan margin, border, padding, content size.
        *   **Toggle device toolbar:** Giả lập hiển thị trên các thiết bị khác nhau để kiểm tra responsive.

**II. JavaScript**

*   **Mục đích:** Tạo tương tác, thay đổi nội dung HTML/CSS động, xử lý sự kiện, giao tiếp với server (AJAX). Chạy phía client (trình duyệt).
*   **Cách nhúng JavaScript:**
    *   Inline: `onclick="myFunction()"` (không khuyến khích cho code phức tạp).
    *   Embedded: Thẻ `<script>` trong `<head>` hoặc `<body>`.
    *   External: File `.js` riêng biệt, liên kết bằng `<script src="script.js"></script>`. *Khuyến khích đặt ở cuối `<body>`*.
*   **Cú pháp JavaScript cơ bản:**
    *   **Biến:**
        *   `var name = "BK";` (khai báo toàn cục hoặc trong hàm, có hoisting).
        *   `let age = 20;` (khai báo trong block scope, không có hoisting).
        *   `const PI = 3.14;` (hằng số, không thể gán lại giá trị).
    *   **Kiểu dữ liệu:**
        *   Primitive: `string` ("Hello"), `number` (10, 3.14), `boolean` (true, false), `null`, `undefined`, `symbol` (ES6), `bigint` (ES11).
        *   Complex: `object` (`{ key: "value" }`), `array` (`[1, "two", true]`).
    *   **Toán tử:**
        *   Số học: `+`, `-`, `*`, `/`, `%` (chia lấy dư), `++`, `--`.
        *   Gán: `=`, `+=`, `-=`, `*=`, `/=`.
        *   So sánh: `==` (so sánh giá trị, có ép kiểu), `===` (so sánh cả giá trị và kiểu, không ép kiểu - *nên dùng*), `!=`, `!==`, `>`, `<`, `>=`, `<=`.
        *   Logic: `&&` (AND), `||` (OR), `!` (NOT).
        *   Ba ngôi: `condition ? valueIfTrue : valueIfFalse`.
    *   **Cấu trúc điều khiển:**
        *   `if (condition) { ... } else if (anotherCondition) { ... } else { ... }`
        *   `switch (expression) { case value1: ...; break; case value2: ...; break; default: ...; }`
    *   **Vòng lặp:**
        *   `for (let i = 0; i < 5; i++) { ... }`
        *   `while (condition) { ... }`
        *   `do { ... } while (condition);`
        *   `for...in` (dùng để lặp qua các thuộc tính của object - không nên dùng cho array).
        *   `for...of` (ES6 - dùng để lặp qua các giá trị của iterable objects như array, string).
    *   **Hàm (Functions):**
        *   Khai báo: `function tenHam(thamSo1, thamSo2) { ...; return giaTri; }`
        *   Gọi hàm: `tenHam(giaTri1, giaTri2);`
        *   **Anonymous Functions (Hàm ẩn danh):** Hàm không có tên, thường gán cho biến hoặc làm callback.
            *   Ví dụ: `let sayHello = function() { console.log("Hello!"); }; sayHello();`
        *   **Arrow Functions (ES6):** Cú pháp ngắn gọn hơn cho hàm.
            *   Ví dụ: `let add = (a, b) => a + b;`
            *   Ví dụ callback: `numbers.map(num => num * 2);`
        *   **Scope:** Phạm vi của biến (global scope, function scope, block scope - với `let` và `const`).
    *   **Objects:** Tập hợp các cặp `key: value`.
        *   Ví dụ: `let person = { name: "An", age: 20, greet: function() { console.log("Hi, I'm " + this.name); } };`
        *   Truy cập thuộc tính: `person.name` hoặc `person["name"]`.
    *   **Arrays:** Danh sách các giá trị, có thể chứa nhiều kiểu dữ liệu.
        *   Ví dụ: `let fruits = ["Apple", "Banana", "Orange"];`
        *   Truy cập phần tử: `fruits[0]` (là "Apple").
        *   Phương thức array: `push()`, `pop()`, `shift()`, `unshift()`, `slice()`, `splice()`, `forEach()`, `map()`, `filter()`, `reduce()`.
*   **DOM Manipulation (Thao tác với DOM):**
    *   **Truy xuất phần tử:**
        *   `document.getElementById("id_name")`: Trả về 1 phần tử.
        *   `document.getElementsByTagName("tag_name")`: Trả về HTMLCollection (giống mảng) các phần tử.
        *   `document.getElementsByClassName("class_name")`: Trả về HTMLCollection.
        *   `document.querySelector("css_selector")`: Trả về phần tử đầu tiên khớp selector.
        *   `document.querySelectorAll("css_selector")`: Trả về NodeList (giống mảng) tất cả các phần tử khớp selector.
    *   **Thay đổi nội dung:**
        *   `element.innerHTML = "<b>Nội dung mới</b>";` (Có thể chứa HTML).
        *   `element.textContent = "Nội dung mới dạng text";` (Chỉ text, an toàn hơn `innerHTML` để tránh XSS).
        *   `inputElement.value = "Giá trị mới";` (Dùng cho thẻ `input`, `textarea`, `select`).
    *   **Thay đổi thuộc tính:**
        *   `element.setAttribute("attribute_name", "new_value");`
        *   `element.getAttribute("attribute_name");`
        *   Hoặc trực tiếp: `imageElement.src = "new_image.png";` `linkElement.href = "new_url.html";`
    *   **Thay đổi CSS Style:**
        *   `element.style.propertyName = "value";` (Lưu ý: `propertyName` dùng camelCase, ví dụ `backgroundColor` cho `background-color`).
            *   Ví dụ: `myDiv.style.color = "red"; myDiv.style.fontSize = "20px";`
        *   Thay đổi class: `element.classList.add("new-class");`, `element.classList.remove("old-class");`, `element.classList.toggle("active-class");`
    *   **Tạo và Thêm/Xóa Phần tử:**
        *   `let newElement = document.createElement("div");`
        *   `newElement.textContent = "Nội dung của div mới";`
        *   `parentElement.appendChild(newElement);` (Thêm vào cuối `parentElement`).
        *   `parentElement.insertBefore(newElement, existingChildElement);` (Thêm trước `existingChildElement`).
        *   `parentElement.removeChild(childElement);`
*   **Events (Sự kiện):** Hành động của người dùng hoặc trình duyệt.
    *   **Các loại sự kiện phổ biến:** `click`, `mouseover`, `mouseout`, `mousedown`, `mouseup`, `mousemove`, `keydown`, `keyup`, `keypress`, `change` (cho form input), `submit` (cho form), `load` (tài liệu/ảnh tải xong), `focus`, `blur`.
    *   **Cách gán Event Listener:**
        *   HTML attribute: `<button onclick="myFunction()">Click Me</button>` (cách cũ).
        *   DOM property: `myButton.onclick = function() { ... };` (chỉ gán được 1 handler).
        *   `element.addEventListener("event_name", function_handler, useCapture);` (cách hiện đại, có thể gán nhiều handler).
            *   Ví dụ: `myButton.addEventListener("click", function() { alert("Button clicked!"); });`
    *   **Event Object:** Đối tượng được truyền vào hàm xử lý sự kiện, chứa thông tin về sự kiện (ví dụ: `event.target`, `event.preventDefault()`).
*   **Xử lý Form bằng JavaScript:**
    *   Lấy giá trị từ các trường input: `document.getElementById("myInput").value;`
    *   Client-side validation: Kiểm tra dữ liệu trước khi gửi lên server.
        *   Ví dụ: Kiểm tra email có @, mật khẩu đủ dài, trường bắt buộc không được trống.
    *   Ngăn chặn submit form mặc định: `event.preventDefault();` trong hàm xử lý sự kiện `submit` của form.
*   **jQuery (Thư viện JavaScript):** "Write less, do more".
    *   **Cú pháp cơ bản:** `$(selector).action();`
    *   **Selectors:** Tương tự CSS selectors.
        *   Ví dụ: `$("p")` (chọn tất cả thẻ `<p>`), `$(".myClass")`, `$("#myId")`.
    *   **DOM Traversal:**
        *   `.parent()`, `.parents()`, `.children()`, `.find(selector)`, `.siblings()`, `.next()`, `.prev()`.
    *   **DOM Manipulation:**
        *   `.html("nội dung mới")`, `.text("nội dung mới")` (tương tự `innerHTML`, `textContent`).
        *   `.val("giá trị mới")` (cho form elements).
        *   `.attr("attribute_name", "new_value")`.
        *   `.css("property_name", "value")` hoặc `.css({ "property1": "value1", "property2": "value2" })`.
        *   `.addClass("class_name")`, `.removeClass("class_name")`, `.toggleClass("class_name")`.
        *   `.append(content)`, `.prepend(content)`, `.before(content)`, `.after(content)`.
        *   `.remove()`, `.empty()` (xóa con, giữ lại element cha).
    *   **Events:** Cú pháp đơn giản hơn.
        *   `.on("event_name", handlerFunction)` (cách khuyến khích).
        *   Hoặc các hàm tiện ích: `.click(handler)`, `.hover(handlerIn, handlerOut)`, `.change(handler)`, `.submit(handler)`.
            *   Ví dụ: `$("button").click(function() { alert("Button clicked via jQuery!"); });`
    *   **Effects & Animations:**
        *   `.show(speed, callback)`, `.hide(speed, callback)`, `.toggle(speed, callback)`.
        *   `.fadeIn(speed, callback)`, `.fadeOut(speed, callback)`, `.fadeTo(speed, opacity, callback)`, `.fadeToggle()`.
        *   `.slideDown(speed, callback)`, `.slideUp(speed, callback)`, `.slideToggle(speed, callback)`.
        *   `.animate({ cssProperties }, speed, callback)`.
            *   Ví dụ: `$("#box").animate({left: '250px', opacity: '0.5'}, 1000);`
    *   **$(document).ready(function(){ ... });** hoặc ngắn gọn `$(function(){ ... });`: Đảm bảo code jQuery chạy sau khi DOM đã tải xong hoàn toàn. Rất quan trọng.
*   **AJAX (Asynchronous JavaScript and XML):** Giao tiếp bất đồng bộ với server mà không cần tải lại trang.
    *   **Khái niệm:** Cho phép JS gửi request đến server và nhận response mà không làm gián đoạn trải nghiệm người dùng.
    *   **XMLHttpRequest Object (XHR):** Đối tượng gốc để thực hiện AJAX trong JS thuần (cú pháp hơi dài dòng).
        *   Các bước: Tạo object, `open()` (method, URL, async), `onreadystatechange` (xử lý response dựa trên `readyState` và `status`), `send()`.
    *   **`fetch()` API (ES6):** Cách hiện đại hơn, dựa trên Promises.
        *   Ví dụ:
            ```javascript
            fetch('api/data.json')
                .then(response => {
                    if (!response.ok) { throw new Error('Network response was not ok'); }
                    return response.json(); // hoặc response.text() nếu là text/html
                })
                .then(data => {
                    console.log(data); // Xử lý dữ liệu ở đây
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
            ```
    *   **jQuery AJAX:** Cung cấp các hàm tiện lợi hơn.
        *   `$.ajax({ url: "...", type: "GET/POST", data: {...}, success: function(response){...}, error: function(){...} });`
        *   `$.get(url, data, successCallback, dataType);`
        *   `$.post(url, data, successCallback, dataType);`
        *   `$.getJSON(url, data, successCallback);` (Tự động parse JSON response).
            *   Ví dụ:
                ```javascript
                $.getJSON("api/user.php", { userId: 123 }, function(user) {
                    $("#userName").text(user.name);
                });
                ```
*   **JSON (JavaScript Object Notation):** Định dạng trao đổi dữ liệu nhẹ, dễ đọc cho người, dễ parse cho máy.
    *   Cú pháp: Dựa trên cú pháp object của JavaScript.
        *   Ví dụ: `{ "name": "BK", "courses": ["Web Programming", "Database"] }`
    *   `JSON.parse(jsonString)`: Chuyển chuỗi JSON thành đối tượng JavaScript.
    *   `JSON.stringify(jsObject)`: Chuyển đối tượng JavaScript thành chuỗi JSON.

**III. PHP & MySQL**

*   **Mục đích PHP:** Ngôn ngữ kịch bản phía server, dùng để xử lý logic, tương tác CSDL, tạo nội dung HTML động.
*   **Cú pháp PHP cơ bản:**
    *   Nhúng vào HTML: `<?php // code PHP ở đây ?>` hoặc `<?= $variable; // cách viết tắt của echo ?>`
    *   Biến: Luôn bắt đầu bằng `$`. Ví dụ: `$username = "admin"; $age = 30;`
    *   `echo` và `print`: Xuất dữ liệu ra trình duyệt. `echo` nhanh hơn một chút và có thể xuất nhiều tham số.
    *   Comments: `// Dòng comment`, `# Dòng comment`, `/* Khối comment */`.
    *   Strings:
        *   Nháy đơn (`'...'`): Chuỗi nguyên văn, biến bên trong không được nội suy. Chỉ escape `\'` và `\\`.
        *   Nháy kép (`"..."`): Biến bên trong được nội suy. Nhiều ký tự escape hơn (`\n`, `\t`, `\$`, `\"`).
            *   Ví dụ: `$name = "BK"; echo "Hello $name"; // Output: Hello BK`
            *   Ví dụ: `echo 'Hello $name'; // Output: Hello $name`
        *   Nối chuỗi: Dùng dấu chấm (`.`). Ví dụ: `echo "Xin " . "chào " . $name;`
    *   Mảng (Arrays):
        *   Indexed arrays: `$cars = array("Volvo", "BMW", "Toyota");` hoặc `$cars = ["Volvo", "BMW", "Toyota"];` (PHP 5.4+). Truy cập: `$cars[0]`.
        *   Associative arrays (key-value): `$age = array("Peter"=>35, "Ben"=>37);` hoặc `$age = ["Peter"=>35, "Ben"=>37];`. Truy cập: `$age["Peter"]`.
        *   Lặp qua mảng: `foreach ($colors as $color) { ... }` hoặc `foreach ($ages as $name => $age) { ... }`.
    *   Cấu trúc điều khiển: `if...elseif...else`, `switch`, `while`, `do...while`, `for`.
    *   Hàm:
        *   Định nghĩa: `function myFunctionName($param1, $param2) { ...; return $value; }`
        *   Gọi hàm: `$result = myFunctionName(10, 20);`
        *   Các hàm xử lý chuỗi, mảng, ngày tháng có sẵn rất nhiều.
*   **Superglobals (Biến siêu toàn cục):** Các biến có sẵn của PHP, truy cập được từ mọi nơi.
    *   `$_GET`: Mảng chứa các tham số truyền qua URL (method GET).
    *   `$_POST`: Mảng chứa các dữ liệu gửi từ form (method POST).
    *   `$_REQUEST`: Mảng chứa cả `$_GET`, `$_POST` và `$_COOKIE` (nên cẩn thận khi dùng).
    *   `$_FILES`: Mảng chứa thông tin về file được upload.
    *   `$_SESSION`: Mảng chứa các biến session.
    *   `$_COOKIE`: Mảng chứa các cookie.
    *   `$_SERVER`: Mảng chứa thông tin về server và môi trường thực thi.
*   **Xử lý Form với PHP:**
    *   Nhận dữ liệu:
        *   Ví dụ: `if ($_SERVER["REQUEST_METHOD"] == "POST") { $name = $_POST["username"]; $email = $_POST["email"]; }`
    *   **Validation (Kiểm tra dữ liệu) phía Server:** Rất quan trọng để đảm bảo an toàn và tính toàn vẹn dữ liệu.
        *   Kiểm tra rỗng: `empty($variable)`.
        *   Kiểm tra định dạng email: `filter_var($email, FILTER_VALIDATE_EMAIL)`.
        *   Làm sạch dữ liệu (tránh XSS): `htmlspecialchars($input, ENT_QUOTES, 'UTF-8')`.
        *   Làm sạch dữ liệu (tránh SQL Injection khi không dùng prepared statements): `mysqli_real_escape_string($connection, $input)`.
    *   Xử lý file upload: Kiểm tra `$_FILES['uploaded_file']['error']`, `move_uploaded_file()`.
*   **Tương tác với MySQL (sử dụng `mysqli` extension - procedural style thường gặp trong đề cương):**
    *   **Kết nối CSDL:**
        *   `$conn = mysqli_connect("localhost", "username", "password", "database_name");`
        *   Kiểm tra kết nối: `if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }`
    *   **Chọn Database (nếu chưa chọn khi connect):**
        *   `mysqli_select_db($conn, "database_name");` (Ít dùng nếu đã chỉ định DB khi connect).
    *   **Thực thi câu lệnh SQL:**
        *   `$sql = "SELECT id, firstname, lastname FROM Users";`
        *   `$result = mysqli_query($conn, $sql);`
        *   Kiểm tra lỗi query: `if (!$result) { echo "Error: " . mysqli_error($conn); }`
    *   **Xử lý kết quả từ `SELECT`:**
        *   `mysqli_num_rows($result)`: Trả về số dòng trong kết quả.
        *   Lặp qua các dòng:
            ```php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { // Hoặc mysqli_fetch_row($result)
                    echo "ID: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                }
            } else {
                echo "0 results";
            }
            ```
            *   `mysqli_fetch_assoc($result)`: Trả về một dòng kết quả dưới dạng mảng kết hợp (tên cột là key).
            *   `mysqli_fetch_row($result)`: Trả về một dòng kết quả dưới dạng mảng chỉ số (số thứ tự cột là key).
    *   **Xử lý `INSERT`, `UPDATE`, `DELETE`:**
        *   `$sql_insert = "INSERT INTO Users (firstname, lastname) VALUES ('John', 'Doe')";`
        *   `if (mysqli_query($conn, $sql_insert)) { echo "New record created successfully"; } else { echo "Error: " . mysqli_error($conn); }`
        *   `mysqli_affected_rows($conn)`: Trả về số dòng bị ảnh hưởng bởi câu lệnh INSERT, UPDATE, DELETE trước đó.
    *   **Giải phóng bộ nhớ kết quả (sau khi dùng `SELECT`):**
        *   `mysqli_free_result($result);`
    *   **Đóng kết nối:**
        *   `mysqli_close($conn);`
    *   **Chống SQL Injection:**
        *   Dùng `mysqli_real_escape_string($conn, $data)` để escape các ký tự đặc biệt trước khi đưa vào câu SQL (cách cơ bản).
        *   **Prepared Statements (mysqli hoặc PDO):** Cách an toàn và được khuyến khích hơn nhiều. (Nếu trong đề cương thi/lab có, cần ôn kỹ).
            *   Ví dụ (mysqli, procedural):
                ```php
                $stmt = mysqli_prepare($conn, "SELECT id FROM Users WHERE email = ?");
                mysqli_stmt_bind_param($stmt, "s", $email_param); // "s" for string
                $email_param = "user@example.com";
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id_result);
                mysqli_stmt_fetch($stmt);
                // ...
                mysqli_stmt_close($stmt);
                ```
*   **PDO (PHP Data Objects):** Một cách khác để tương tác CSDL, hỗ trợ nhiều hệ CSDL khác nhau, cú pháp thường là hướng đối tượng. (Xem qua nếu có trong Lab 03).

**IV. Cookie & Session**

*   **Cookie:**
    *   **Khái niệm:** Mẩu thông tin nhỏ được server gửi cho browser, browser lưu lại và gửi kèm trong các request tiếp theo đến cùng server. Lưu trữ phía client.
    *   **PHP:**
        *   Tạo/Cập nhật: `setcookie("cookie_name", "cookie_value", time() + (86400 * 30), "/", "example.com", true, true);`
            *   `name`, `value`: Tên và giá trị cookie.
            *   `expire`: Thời gian sống (timestamp), `time() + (86400 * 30)` là 30 ngày. 0 là hết hạn khi đóng browser.
            *   `path`: Đường dẫn trên server mà cookie sẽ có hiệu lực. `/` là toàn bộ domain.
            *   `domain`: Domain mà cookie có hiệu lực.
            *   `secure`: `true` thì cookie chỉ gửi qua HTTPS.
            *   `httponly`: `true` thì cookie không thể truy cập bằng JavaScript phía client (tăng bảo mật).
        *   Đọc: `$_COOKIE["cookie_name"]`. Luôn kiểm tra bằng `isset($_COOKIE["cookie_name"])` trước khi dùng.
        *   Xóa: `setcookie("cookie_name", "", time() - 3600, "/");` (set thời gian sống về quá khứ).
    *   **Ứng dụng:** "Remember me", lưu trữ tùy chọn người dùng, theo dõi hành vi (tracking).
*   **Session:**
    *   **Khái niệm:** Lưu trữ thông tin người dùng phía server cho một phiên làm việc. Client chỉ giữ một session ID (thường qua cookie hoặc URL). An toàn hơn cookie để lưu dữ liệu nhạy cảm.
    *   **PHP:**
        *   Bắt đầu/Khôi phục session: `session_start();` (phải gọi trước mọi output ra trình duyệt).
        *   Lưu trữ dữ liệu: `$_SESSION["variable_name"] = "value";`
        *   Đọc dữ liệu: `$value = $_SESSION["variable_name"];` (Luôn kiểm tra bằng `isset()`).
        *   Xóa một biến session: `unset($_SESSION["variable_name"]);`
        *   Hủy toàn bộ session: `session_destroy();` (và có thể cần `session_unset()` để xóa biến `$_SESSION`).
    *   **Ứng dụng:** Đăng nhập người dùng, giỏ hàng, lưu trạng thái form nhiều bước.

**V. Web Services**

*   **Khái niệm:** Cách các ứng dụng khác nhau giao tiếp với nhau qua mạng (thường là HTTP).
*   **REST (Representational State Transfer):** Một kiểu kiến trúc phổ biến để thiết kế Web Services.
    *   Sử dụng các **HTTP Methods** chuẩn:
        *   `GET`: Lấy dữ liệu (an toàn, không thay đổi dữ liệu server).
        *   `POST`: Tạo mới dữ liệu.
        *   `PUT`: Cập nhật toàn bộ dữ liệu đã có.
        *   `PATCH`: Cập nhật một phần dữ liệu đã có.
        *   `DELETE`: Xóa dữ liệu.
    *   **Resources (Tài nguyên):** Mọi thứ đều là tài nguyên, được định danh bằng URI (Uniform Resource Identifier).
        *   Ví dụ: `/users`, `/users/123`, `/products/456/reviews`.
    *   **Stateless:** Mỗi request từ client đến server phải chứa đủ thông tin để server hiểu, server không lưu trạng thái client giữa các request.
*   **SOAP (Simple Object Access Protocol):** Một giao thức khác, dựa trên XML, phức tạp hơn REST. (Biết tên và sự khác biệt cơ bản).
*   **Định dạng dữ liệu trao đổi:**
    *   **JSON (JavaScript Object Notation):** Rất phổ biến, nhẹ, dễ đọc, dễ parse. Thường dùng với REST.
    *   **XML (eXtensible Markup Language):** Định dạng dựa trên thẻ, chặt chẽ hơn. Thường dùng với SOAP.
*   **HTTP Status Codes (Mã trạng thái HTTP):** Server trả về để cho client biết kết quả của request.
    *   `1xx`: Informational.
    *   `2xx`: Success (ví dụ: `200 OK`, `201 Created` - sau khi POST thành công).
    *   `3xx`: Redirection.
    *   `4xx`: Client Error (ví dụ: `400 Bad Request`, `401 Unauthorized`, `403 Forbidden`, `404 Not Found`).
    *   `5xx`: Server Error (ví dụ: `500 Internal Server Error`).

**VI. SEO (Search Engine Optimization)**

*   **Khái niệm:** Các kỹ thuật nhằm cải thiện thứ hạng của website trên trang kết quả của công cụ tìm kiếm (SERP) một cách tự nhiên (organic).
*   **On-Page SEO (Các yếu tố tối ưu trên chính trang web):**
    *   **Keywords (Từ khóa):** Nghiên cứu từ khóa người dùng hay tìm kiếm liên quan đến nội dung của bạn. Chèn từ khóa một cách tự nhiên vào:
    *   **Title Tag (`<title>`):** Tiêu đề trang, cực kỳ quan trọng. Ngắn gọn, chứa từ khóa chính, hấp dẫn.
    *   **Meta Description Tag (`<meta name="description" content="...">`):** Đoạn mô tả ngắn về trang, hiển thị dưới title trên SERP. Không ảnh hưởng trực tiếp đến ranking nhưng ảnh hưởng đến tỷ lệ click (CTR).
    *   **Header Tags (`<h1>` - `<h6>`):** Phân cấp nội dung. `<h1>` cho tiêu đề chính, chứa từ khóa.
    *   **Content Quality (Chất lượng nội dung):** Nội dung phải độc đáo, hữu ích, dễ đọc, cung cấp giá trị cho người dùng.
    *   **Image Optimization:**
        *   `alt` text cho thẻ `<img>`: Mô tả hình ảnh, chứa từ khóa nếu hợp lý. Giúp search engine hiểu ảnh và quan trọng cho accessibility.
        *   Tên file ảnh nên mô tả và chứa từ khóa (ví dụ: `lap-trinh-web-co-ban.jpg`).
        *   Nén ảnh để giảm dung lượng, tăng tốc độ tải trang.
    *   **URL Structure (Cấu trúc URL):**
        *   URL thân thiện, dễ đọc, chứa từ khóa.
        *   Ví dụ: `example.com/dich-vu/thiet-ke-website` tốt hơn `example.com/service.php?id=1`.
    *   **Internal Linking:** Liên kết giữa các trang trong cùng website của bạn. Giúp điều hướng người dùng và search engine, phân phối "link juice".
    *   **Website Speed:** Tốc độ tải trang là một yếu tố xếp hạng.
    *   **Mobile-Friendliness:** Trang web phải hiển thị tốt trên thiết bị di động (responsive design).
*   **Off-Page SEO (Các yếu tố bên ngoài website):**
    *   **Backlinks:** Liên kết từ các website khác trỏ về website của bạn. Càng nhiều backlink chất lượng từ các trang uy tín, liên quan thì càng tốt. (Slide có nói về PageRank).
*   **Technical SEO:**
    *   **`robots.txt`:** File text ở thư mục gốc, chỉ dẫn cho search engine bots biết trang nào được phép/không được phép crawl.
        *   Ví dụ: `User-agent: *` (áp dụng cho tất cả bots) `Disallow: /admin/` (không cho vào thư mục admin).
    *   **Sitemap.xml:** File XML liệt kê tất cả các URL quan trọng trên website của bạn, giúp search engine dễ dàng tìm và index nội dung.

**VII. Web Security**

*   **OWASP Top 10:** Danh sách các lỗ hổng bảo mật web phổ biến nhất (nên biết tên một vài loại).
*   **XSS (Cross-Site Scripting):** Kẻ tấn công chèn mã JavaScript độc hại vào trang web, mã này sẽ được thực thi trên trình duyệt của người dùng khác.
    *   **Reflected XSS:** Mã độc nằm trong URL, được phản chiếu lại từ server.
    *   **Stored XSS:** Mã độc được lưu trữ trong CSDL (ví dụ: trong bình luận, bài viết) và hiển thị cho người dùng khác.
    *   **DOM-based XSS:** Lỗ hổng xảy ra ở phía client do JS xử lý DOM không an toàn.
    *   **Phòng chống XSS:**
        *   **Escaping Output:** Luôn luôn escape dữ liệu do người dùng nhập vào trước khi hiển thị ra trang HTML. Trong PHP, dùng `htmlspecialchars($data, ENT_QUOTES, 'UTF-8');`.
        *   Content Security Policy (CSP).
        *   Input validation.
*   **SQL Injection:** Kẻ tấn công chèn mã SQL độc hại vào các câu truy vấn CSDL, có thể dẫn đến rò rỉ, sửa đổi, xóa dữ liệu.
    *   **Cách tấn công:** Chèn các ký tự đặc biệt của SQL (ví dụ: `'`, `--`, `;`) vào input để thay đổi logic câu query.
        *   Ví dụ: `SELECT * FROM users WHERE username = 'admin' OR '1'='1'; --` (luôn đúng).
    *   **Phòng chống SQL Injection:**
        *   **Prepared Statements (Parameterized Queries):** Cách tốt nhất. Câu lệnh SQL được định nghĩa trước với các placeholder, sau đó dữ liệu người dùng được truyền vào như tham số riêng biệt, không bị coi là một phần của câu lệnh SQL. (mysqli và PDO đều hỗ trợ).
        *   Escaping Input: Nếu không dùng prepared statements (không khuyến khích), phải escape tất cả dữ liệu người dùng trước khi đưa vào câu SQL. Trong PHP (mysqli): `mysqli_real_escape_string($connection, $input);`.
        *   Input validation (kiểm tra kiểu dữ liệu, độ dài, định dạng).
        *   Least Privilege: Tài khoản CSDL dùng cho web app chỉ nên có quyền hạn tối thiểu cần thiết.
*   **CSRF (Cross-Site Request Forgery):** Kẻ tấn công lừa trình duyệt của người dùng đã đăng nhập gửi một request độc hại đến một website mà người dùng đó đã xác thực, thực hiện hành động không mong muốn dưới danh nghĩa người dùng.
    *   **Phòng chống:** Sử dụng Anti-CSRF Tokens (mã token ngẫu nhiên, duy nhất cho mỗi session/request).
*   **File Inclusion:**
    *   **LFI (Local File Inclusion):** Cho phép kẻ tấn công đọc nội dung file tùy ý trên server.
    *   **RFI (Remote File Inclusion):** Cho phép kẻ tấn công thực thi code từ một server từ xa.
    *   **Phòng chống:** Không bao giờ include file dựa trực tiếp vào input của người dùng. Validate đường dẫn file.
*   **Command Injection:** Cho phép kẻ tấn công thực thi các lệnh hệ thống tùy ý trên server.
    *   **Phòng chống:** Tránh gọi lệnh hệ thống dựa trên input người dùng. Nếu cần, phải sanitize input cẩn thận (ví dụ `escapeshellcmd()`, `escapeshellarg()` trong PHP).
*   **Brute Force Attack:** Tấn công dò mật khẩu bằng cách thử liên tục các Kombination khác nhau.
    *   **Phòng chống:** Giới hạn số lần đăng nhập sai, CAPTCHA, mật khẩu mạnh, two-factor authentication.
*   **Input Validation (Rất quan trọng cho nhiều loại tấn công):**
    *   **Client-side (JavaScript):** Cung cấp phản hồi nhanh cho người dùng, cải thiện UX, nhưng dễ bị bypass.
    *   **Server-side (PHP):** Bắt buộc phải có, là lớp bảo vệ cuối cùng. Luôn kiểm tra kiểu dữ liệu, độ dài, định dạng, giá trị cho phép.
*   **Nguyên tắc chung:**
    *   **Defense in Depth:** Nhiều lớp bảo vệ.
    *   **Principle of Least Privilege:** Cấp quyền tối thiểu cần thiết.
    *   **Don't Trust User Input:** Luôn coi dữ liệu từ người dùng là tiềm ẩn nguy hiểm.
    *   **Keep Software Updated:** Vá lỗi bảo mật thường xuyên.
    *   Sử dụng HTTPS.

---
