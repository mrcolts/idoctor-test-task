# Аккаунты

- [Список специализации](#список-специализации)
- [Список докторов](#список-докторов)

## Список специализации

> **Url**: /skills
>
> **Method**: GET
>
> **Auth**: False

###### Тело запроса
```json
{
    "name" : "Акушер",
}
```

Подробное описание параметров:
1. name - Наименование специализации


### Пример

#### Запрос
###### Url
https://idoctor-test-task.mrcolt.com/api/v1/skills?name=Акушер

###### Headers
Content-Type: application/json


#### Ответ
> **Status**: 200
#### Тело ответа:
```json
{
  "success": true,
  "data": {
    "result": [
      {
        "id": "ca09f971-db44-4f37-a236-03f73fc2b002",
        "name": "Акушер-гинеколог"
      }
    ],
    "pagination": {
      "totalRows": 330,
      "perPage": 15,
      "currentPage": 1,
      "totalPages": 22
    }
  },
  "message": "Skills retrieved successfully."
}
```

### Типы ответа
```
    data - nullable|array
        result - nullable|array
            id - required|string
            name - required|string
        pagination - required|object
            totalRows - required|integer
            perPage - required|integer
            currentPage - required|boolean
            totalPages - required|integer
    success - required|string
    message - reuiqred|string
```

Подробное описание ответа:
1. result - Массив со скиллами:
   1. id - ID скилла
   2. name - Наименование скилла
2. pagination - Пагинация
   1. totalRows - Общее кол-во элементов
   2. perPage - Сколько элементов отображается на каждой странице
   3. currentPage - Номер текущей страницы
   4. totalPages - Кол-во всех страниц


## Список докторов

> **Url**: /doctors
>
> **Method**: GET
>
> **Auth**: False

###### Тело запроса
```json
{
    "name" : "бла бла ьл",
    "firstName" : "бла",
    "lastName" : "бла",
    "city" : "Актау",
    "workExperienceYear" : "2001",
    "skill" : "Стоматолог"
}
```

Подробное описание параметров:
1. name - Полное имя доктора 
2. firstName - Имя
3. lastName - Фамилия
4. city - Название города
5. workExperienceYear - Стаж работы в годах
6. skill - Наименование специализации


### Пример

#### Запрос
###### Url
https://idoctor-test-task.mrcolt.com/api/v1/skills

###### Headers
Content-Type: application/json


#### Ответ
> **Status**: 200
#### Тело ответа:
```json
{
  "success": true,
  "data": {
    "result": [
      {
        "id": "9be8017a-4b67-4172-b56a-854aff816566",
        "firstName": "Андрей",
        "lastName": "Кораблёв",
        "city": "Алматы",
        "worksSinceYear": "1991",
        "skills": [
          {
            "id": "96a8f6b7-a049-405f-a3ca-6c9904222094",
            "name": "Стоматолог"
          }
        ]
      }
    ],
    "pagination": {
      "totalRows": 330,
      "perPage": 15,
      "currentPage": 1,
      "totalPages": 22
    }
  },
  "message": "Skills retrieved successfully."
}
```

### Типы ответа
```
    data - nullable|array
        result - nullable|array
            id - required|string
            firstName - required|string
            lastName - required|string
            city - required|string
            skills - nullable|array
                id - required|string
                name - required|string
        pagination - required|object
            totalRows - required|integer
            perPage - required|integer
            currentPage - required|boolean
            totalPages - required|integer
    success - required|string
    message - reuiqred|string
```

Подробное описание ответа:
1. result - Массив с докторами:
   1. id - ID скилла
   2. firstName - Имя
   3. lastName - Фамилия
   4. city - Город
   5. worksSinceYear - Стаж работы в годах
   6. skills - Массив со скиллами
      1. id - ИД скилла
      2. name - Наименование скилла
2. pagination - Пагинация
   1. totalRows - Общее кол-во элементов
   2. perPage - Сколько элементов отображается на каждой странице
   3. currentPage - Номер текущей страницы
   4. totalPages - Кол-во всех страниц