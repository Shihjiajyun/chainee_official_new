<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課程分類</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/course_classification.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- 導覽列 -->
    <?php include './navbar.php' ?>

    <div class="banner mb-5">
        <h1 id="banner-title" class="display-4 fw-bold">探索課程</h1>
    </div>

    <!-- Main Content -->
    <div class="container pb-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <h5 class="mb-3">分類</h5>
                <div class="list-group" id="category-list">
                    <a href="#" class="list-group-item list-group-item-action active" data-title="探索課程" data-courses='[{
                    "title": "區塊鏈基礎入門",
                    "image": "./img/lesson.jpg",
                    "priceBefore": "NT$11,000",
                    "priceAfter": "NT$3,740",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }, {
                    "title": "區塊鏈應用開發",
                    "image": "./img/lesson1.jpg",
                    "priceBefore": "NT$8,500",
                    "priceAfter": "NT$2,990",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }, {
                    "title": "區塊鏈與智能合約",
                    "image": "./img/lesson2.jpg",
                    "priceBefore": "NT$10,000",
                    "priceAfter": "NT$3,500",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }, {
                    "title": "NFT市場概論",
                    "image": "./img/lesson.jpg",
                    "priceBefore": "NT$9,200",
                    "priceAfter": "NT$3,200",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }]'>全部課程</a>
                    <a href="#" class="list-group-item list-group-item-action" data-title="智能合約專區" data-courses='[{
                    "title": "智能合約開發基礎",
                    "image": "./img/lesson.jpg",
                    "priceBefore": "NT$12,000",
                    "priceAfter": "NT$4,000",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }, {
                    "title": "智能合約進階實戰",
                    "image": "./img/lesson1.jpg",
                    "priceBefore": "NT$15,000",
                    "priceAfter": "NT$5,500",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }]'>智能合約專區</a>
                    <a href="#" class="list-group-item list-group-item-action" data-title="DeFi應用" data-courses='[{
                    "title": "去中心化金融概論",
                    "image": "./img/lesson2.jpg",
                    "priceBefore": "NT$13,000",
                    "priceAfter": "NT$4,500",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }, {
                    "title": "DeFi借貸與流動性挖礦",
                    "image": "./img/lesson.jpg",
                    "priceBefore": "NT$14,000",
                    "priceAfter": "NT$5,000",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }]'>DeFi應用</a>
                    <a href="#" class="list-group-item list-group-item-action" data-title="NFT專題" data-courses='[{
                    "title": "NFT藝術創作與市場",
                    "image": "./img/lesson.jpg",
                    "priceBefore": "NT$9,000",
                    "priceAfter": "NT$3,300",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }, {
                    "title": "NFT項目經營策略",
                    "image": "./img/lesson1.jpg",
                    "priceBefore": "NT$10,000",
                    "priceAfter": "NT$3,800",
                    "teacher": "腦哥",
                    "highlight": "已開課",
                    "link": "./course.php"
                }]'>NFT專題</a>
                </div>
            </div>

            <!-- Course List -->
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="m-0">共 <span id="course-count">0</span> 堂課程</p>
                    <select class="form-select" style="width: auto;">
                        <option selected>依熱門程度排序</option>
                        <option>依最新上架排序</option>
                        <option>依價格高至低排序</option>
                        <option>依價格低至高排序</option>
                    </select>
                </div>

                <div class="row g-4" id="course-container">
                    <!-- Dynamic course cards will be injected here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateContent(title, courses = []) {
            // Update banner title
            document.getElementById('banner-title').innerText = title;

            // Update course count
            document.getElementById('course-count').innerText = courses.length;

            // Update course container
            const container = document.getElementById('course-container');
            container.innerHTML = '';

            courses.forEach(course => {
                const courseCard = `
                <div class="col-md-4">
                    <div class="card course-card">
                        <a href="${course.link}" target="_blank" class="text-decoration-none">
                            <div class="position-relative">
                                <img src="${course.image}" class="card-img-top" alt="${course.title}">
                                <span class="tag tag-red">${course.highlight}</span>
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="${course.link}" class="text-decoration-none">${course.title}</a>
                            </h5>
                            <p class="card-text text-muted">老師：${course.teacher}</p>
                            <p class="card-text"><s>${course.priceBefore}</s> <span class="text-danger fw-bold">${course.priceAfter}</span></p>
                        </div>
                    </div>
                </div>
            `;
                container.innerHTML += courseCard;
            });
        }

        // Initialize with default courses
        const defaultCourses = document.querySelector('[data-title="探索課程"]').dataset.courses;
        updateContent("探索課程", JSON.parse(defaultCourses));

        // Sidebar click event
        document.getElementById('category-list').addEventListener('click', function(event) {
            event.preventDefault();
            const target = event.target;
            if (target.tagName === 'A') {
                // Remove active class from all items
                document.querySelectorAll('#category-list .list-group-item').forEach(item => item.classList.remove('active'));

                // Add active class to the clicked item
                target.classList.add('active');

                // Get new title and courses
                const title = target.getAttribute('data-title');
                const courses = JSON.parse(target.getAttribute('data-courses') || '[]');

                // Update content
                updateContent(title, courses);
            }
        });
    </script>
</body>
<footer>
    <?php include './footer.php' ?>
</footer>

</html>