# 🚀 Инструкция по обновлению проекта на хостинге reg.ru

Данная инструкция описывает процесс обновления Laravel-приложения на хостинге reg.ru после внесения изменений в репозиторий.

---

## 📋 Подготовка

Перед началом обновления убедитесь, что:

- ✅ Все изменения закоммичены и запушены в репозиторий (`git push`)
- ✅ Локально проект работает без ошибок
- ✅ Миграции протестированы локально
- ✅ У вас есть доступ к SSH или FTP хостинга reg.ru

---

## 🔐 Шаг 1: Подключение к серверу

### Вариант A: SSH (рекомендуется)

```bash
ssh username@your-domain.ru
cd /path/to/project
```

> **Примечание:** Путь к проекту обычно находится в `/home/u1234567/domains/your-domain.ru/public_html` или аналогичном.

### Вариант B: FTP

Используйте FTP-клиент (FileZilla, WinSCP и т.д.) для подключения к серверу.

---

## 📥 Шаг 2: Получение обновлений

### Через Git (SSH)

```bash
# Перейти в директорию проекта
cd /path/to/project

# Получить последние изменения
git pull origin main
```

### Через FTP

Загрузите изменённые файлы через FTP-клиент, заменив старые версии.

---

## 📦 Шаг 3: Установка зависимостей

```bash
# Установить/обновить зависимости Composer (без dev-пакетов)
composer install --no-dev --optimize-autoloader

# Если изменились npm-зависимости
npm install --production
npm run build
```

> **Важно:** Флаг `--no-dev` исключает dev-зависимости для продакшена.

---

## 🗄️ Шаг 4: Применение миграций базы данных

```bash
# Применить новые миграции
php artisan migrate --force

# Проверить статус миграций (опционально)
php artisan migrate:status
```

> **⚠️ Внимание:** Флаг `--force` необходим для продакшена, чтобы избежать интерактивных запросов.

---

## 🧹 Шаг 5: Очистка и оптимизация кэша

```bash
# Очистить все кэши
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan event:clear

# Оптимизация для продакшена
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

> **💡 Совет:** Очистка кэша перед оптимизацией гарантирует актуальность данных.

---

## 🗺️ Шаг 6: Генерация Sitemap (если добавлены новые страницы)

```bash
# Сгенерировать sitemap.xml
php artisan sitemap:generate
```

Файл будет создан в `public/sitemap.xml` и автоматически обновляться ежедневно через планировщик задач.

---

## 🔒 Шаг 7: Проверка прав доступа

```bash
# Установить правильные права на директории
chmod -R 755 storage bootstrap/cache
chmod -R 755 public

# Установить владельца (замените www-data на пользователя веб-сервера)
chown -R www-data:www-data storage bootstrap/cache
```

> **Примечание:** На reg.ru пользователь веб-сервера может отличаться. Уточните у поддержки или проверьте текущего владельца файлов.

---

## ✅ Шаг 8: Проверка работоспособности

После обновления проверьте:

1. **Главная страница** — открывается без ошибок
2. **Админ-панель** — доступна по адресу `/stepkinz`
3. **Формы** — отправка заявок работает корректно
4. **API** — `/api/employees` и `/api/phones/check` отвечают
5. **Sitemap** — `/sitemap.xml` доступен и содержит актуальные URL
6. **Robots.txt** — `/robots.txt` содержит ссылку на sitemap

---

## 🔄 Автоматизация (опционально)

Для упрощения процесса можно создать скрипт `deploy.sh`:

```bash
#!/bin/bash

echo "🚀 Начало обновления проекта..."

# Получение изменений
git pull origin main

# Установка зависимостей
composer install --no-dev --optimize-autoloader

# Миграции
php artisan migrate --force

# Очистка кэша
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Оптимизация
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Генерация sitemap
php artisan sitemap:generate

echo "✅ Обновление завершено!"
```

Использование:

```bash
chmod +x deploy.sh
./deploy.sh
```

---

## 🐛 Решение проблем

### Ошибка "Permission denied"

```bash
# Проверить права доступа
ls -la storage bootstrap/cache

# Исправить права
chmod -R 755 storage bootstrap/cache
```

### Ошибка "Class not found"

```bash
# Перегенерировать автозагрузчик
composer dump-autoload --optimize
```

### Ошибка миграций

```bash
# Проверить статус
php artisan migrate:status

# Откатить последнюю миграцию (если нужно)
php artisan migrate:rollback --step=1
```

### Кэш не обновляется

```bash
# Полная очистка всех кэшей
php artisan optimize:clear
```

---

## 📝 Чеклист обновления

- [ ] Подключиться к серверу (SSH/FTP)
- [ ] Получить обновления (`git pull` или загрузка файлов)
- [ ] Установить зависимости (`composer install`)
- [ ] Применить миграции (`php artisan migrate --force`)
- [ ] Очистить кэш (`php artisan optimize:clear`)
- [ ] Оптимизировать кэш (`php artisan optimize`)
- [ ] Сгенерировать sitemap (`php artisan sitemap:generate`)
- [ ] Проверить права доступа (`chmod/chown`)
- [ ] Протестировать основные функции сайта
- [ ] Проверить админ-панель

---

## 📞 Контакты и поддержка

При возникновении проблем:

1. Проверьте логи Laravel: `storage/logs/laravel.log`
2. Проверьте логи веб-сервера через панель reg.ru
3. Обратитесь в поддержку reg.ru при проблемах с доступом

---

## 🔗 Полезные ссылки

- [Документация Laravel](https://laravel.com/docs)
- [Панель управления reg.ru](https://www.reg.ru/)
- [Документация по деплою Laravel](https://laravel.com/docs/deployment)

---

**Последнее обновление:** 30 января 2026
