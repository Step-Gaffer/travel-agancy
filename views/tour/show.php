<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-map-marked-alt me-2"></i>Информация о туре</h2>
        <a href="index.php?entity=tour&action=list" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Назад к списку
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Основная информация</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">ID тура:</div>
                        <div class="col-md-9"><?= $tour['TourID'] ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">Страны:</div>
                        <div class="col-md-9"><?= $tour['Countries'] ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">Города:</div>
                        <div class="col-md-9"><?= $tour['Cities'] ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">Назначение:</div>
                        <div class="col-md-9"><?= $tour['Purpose'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 fw-bold">Стоимость:</div>
                        <div class="col-md-9"><?= number_format($tour['BaseCost'], 0, ',', ' ') ?> руб.</div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0">Детали тура</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">Даты:</div>
                        <div class="col-md-9">
                            <?= date('d.m.Y', strtotime($tour['StartDate'])) ?> -
                            <?= date('d.m.Y', strtotime($tour['EndDate'])) ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">Категория отеля:</div>
                        <div class="col-md-9"><?= $tour['HotelCategory'] ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">Питание:</div>
                        <div class="col-md-9"><?= $tour['MealPlan'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 fw-bold">Транспорт:</div>
                        <div class="col-md-9"><?= $tour['Transport'] ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title mb-0">Действия</h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="index.php?entity=tour&action=edit&id=<?= $tour['TourID'] ?>"
                            class="btn btn-warning mb-2">
                            <i class="fas fa-edit me-1"></i> Редактировать тур
                        </a>
                        <a href="index.php?entity=trip&action=add&tour_id=<?= $tour['TourID'] ?>"
                            class="btn btn-success mb-2">
                            <i class="fas fa-plus me-1"></i> Добавить поездку
                        </a>
                        <a href="index.php?entity=tour&action=delete&id=<?= $tour['TourID'] ?>" class="btn btn-danger"
                            onclick="return confirm('Вы уверены? Удаление тура также удалит все связанные поездки!')">
                            <i class="fas fa-trash me-1"></i> Удалить тур
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>