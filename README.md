# Second version of the Database:

# The ER diagram:

```mermaid
erDiagram
    users ||--o{ memorials : "creates"
    users ||--o{ events : "creates"
    users ||--o{ donations : "makes"
    memorials ||--o{ photos_videos : "person_media"
    events ||--o{ photos_videos : "event_media"
    memorials ||--o{ events : "hosts"
    memorials ||--o{ donations : "receives"

    users {
        int id
        string name
        string email
    }

    memorials {
        int id
        string name
        date birth_date
        int user_id
    }

    photos_videos {
        int id
        string media_path
        int memorial_id
        int event_id
    }

    events {
        int id
        string title
        int memorial_id
        int user_id
    }

    donations {
        int id
        decimal amount
        int memorial_id
        int user_id
        string donor_name
    }
```

    # MYSQL code:

    users {
        int id PK
        string name
        string email
        string password
        timestamp created_at
    }

    memorials {
        int id PK
        string name
        date birth_date
        date death_date
        text biography
        string cover_image
        int user_id FK
        timestamp created_at
    }

    photos_videos {
        int id PK
        string media_path
        text caption
        string type "photo/video"
        int memorial_id FK "nullable"
        int event_id FK "nullable"
        timestamp created_at
    }

    events {
        int id PK
        string title
        datetime event_date
        text location
        int memorial_id FK
        int user_id FK
    }

    donations {
        int id PK
        decimal amount
        string donor_name
        int memorial_id FK
        timestamp created_at
    }

