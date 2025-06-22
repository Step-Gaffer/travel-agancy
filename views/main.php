<div class="hero">
    <h2>Добро пожаловать в турагентство "Вокруг света"</h2>
    <p>Откройте для себя удивительные места по всему миру с нашими эксклюзивными турами. Мы предлагаем лучшие
        направления, отели и экскурсии для вашего идеального отдыха.</p>
    <a href="index.php?entity=tour&action=list" class="btn">Посмотреть туры</a>
</div>

<div class="stats">
    <div class="stat-card">
        <i class="fas fa-users"></i>
        <h3><?= getClientCount() ?></h3>
        <p>Довольных клиентов</p>
    </div>

    <div class="stat-card">
        <i class="fas fa-plane"></i>
        <h3><?= getTourCount() ?></h3>
        <p>Направлений</p>
    </div>

    <div class="stat-card">
        <i class="fas fa-suitcase-rolling"></i>
        <h3><?= getTripCount() ?></h3>
        <p>Поездок в этом году</p>
    </div>

    <div class="stat-card">
        <i class="fas fa-globe-europe"></i>
        <h3>42</h3>
        <p>Страны для путешествий</p>
    </div>
</div>