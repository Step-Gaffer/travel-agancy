<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-map-marked-alt me-2"></i>Добавление нового тура</h2>
        <a href="index.php?entity=tour&action=list" class="btn btn-outline-secondary">
            <i class="fas fa-times me-1"></i> Отмена
        </a>
    </div>

    <form method="POST" action="index.php?entity=tour&action=add">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Основная информация</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Страны <span class="text-danger">*</span></label>
                        <input type="text" name="Countries" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Города <span class="text-danger">*</span></label>
                        <input type="text" name="Cities" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Назначение тура <span class="text-danger">*</span></label>
                    <input type="text" name="Purpose" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Базовая стоимость <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="BaseCost" class="form-control" required>
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
                            <option value="2 звезды">2 звезды</option>
                            <option value="3 звезды">3 звезды</option>
                            <option value="4 звезды">4 звезды</option>
                            <option value="5 звезд">5 звезд</option>
                            <option value="Люкс">Люкс</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Питание</label>
                        <select name="MealPlan" class="form-select">
                            <option value="">Выберите питание</option>
                            <option value="Только завтрак">Только завтрак</option>
                            <option value="Полупансион">Полупансион</option>
                            <option value="Все включено">Все включено</option>
                            <option value="Ультра все включено">Ультра все включено</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Дата начала <span class="text-danger">*</span></label>
                        <input type="date" name="StartDate" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Дата окончания <span class="text-danger">*</span></label>
                        <input type="date" name="EndDate" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Транспорт</label>
                    <select name="Transport" class="form-select">
                        <option value="">Выберите транспорт</option>
                        <option value="Самолет">Самолет</option>
                        <option value="Поезд">Поезд</option>
                        <option value="Автобус">Автобус</option>
                        <option value="Круизный лайнер">Круизный лайнер</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fas fa-save me-1"></i> Добавить тур
            </button>
        </div>
    </form>
</div>