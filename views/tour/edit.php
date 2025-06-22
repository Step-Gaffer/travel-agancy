<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-map-marked-alt me-2"></i>Редактирование тура</h2>
        <a href="index.php?entity=tour&action=show&id=<?= $tour['TourID'] ?>" class="btn btn-outline-secondary">
            <i class="fas fa-times me-1"></i> Отмена
        </a>
    </div>

    <form method="POST" action="index.php?entity=tour&action=edit&id=<?= $tour['TourID'] ?>">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Основная информация</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Страны <span class="text-danger">*</span></label>
                        <input type="text" name="Countries" class="form-control" value="<?= $tour['Countries'] ?>"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Города <span class="text-danger">*</span></label>
                        <input type="text" name="Cities" class="form-control" value="<?= $tour['Cities'] ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Назначение тура <span class="text-danger">*</span></label>
                    <input type="text" name="Purpose" class="form-control" value="<?= $tour['Purpose'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Базовая стоимость <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="BaseCost" class="form-control"
                        value="<?= $tour['BaseCost'] ?>" required>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h3 class="card-title mb-0">Детали тура</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Категория отеля</label>
                        <select name="HotelCategory" class="form-select">
                            <option value="">Выберите категорию</option>
                            <?php
                            $categories = ['2 звезды', '3 звезды', '4 звезды', '5 звезд', 'Люкс'];
                            foreach ($categories as $cat): ?>
                                <option value="<?= $cat ?>" <?= ($tour['HotelCategory'] == $cat) ? 'selected' : '' ?>>
                                    <?= $cat ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Питание</label>
                        <select name="MealPlan" class="form-select">
                            <option value="">Выберите питание</option>
                            <?php
                            $meals = ['Только завтрак', 'Полупансион', 'Все включено', 'Ультра все включено'];
                            foreach ($meals as $meal): ?>
                                <option value="<?= $meal ?>" <?= ($tour['MealPlan'] == $meal) ? 'selected' : '' ?>>
                                    <?= $meal ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Дата начала <span class="text-danger">*</span></label>
                        <input type="date" name="StartDate" class="form-control" value="<?= $tour['StartDate'] ?>"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Дата окончания <span class="text-danger">*</span></label>
                        <input type="date" name="EndDate" class="form-control" value="<?= $tour['EndDate'] ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Транспорт</label>
                    <select name="Transport" class="form-select">
                        <option value="">Выберите транспорт</option>
                        <?php
                        $transports = ['Самолет', 'Поезд', 'Автобус', 'Круизный лайнер'];
                        foreach ($transports as $trans): ?>
                            <option value="<?= $trans ?>" <?= ($tour['Transport'] == $trans) ? 'selected' : '' ?>>
                                <?= $trans ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-warning btn-lg">
                <i class="fas fa-save me-1"></i> Сохранить изменения
            </button>
        </div>
    </form>
</div>