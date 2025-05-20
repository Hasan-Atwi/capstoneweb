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
        int user_id FK "CASCADE"
        timestamp created_at
    }

    photos_videos {
        int id PK
        string media_path
        text caption
        enum type "photo|video"
        int memorial_id FK "NULL,CASCADE"
        int event_id FK "NULL,CASCADE"
        timestamp created_at
        note for photos_videos "Indexes: idx_memorial_id, idx_event_id"
    }

    events {
        int id PK
        string title
        datetime event_date
        text location
        int memorial_id FK "CASCADE"
        int user_id FK "CASCADE"
        note for events "Index: idx_user_id"
    }

    donations {
        int id PK
        decimal amount
        string donor_name
        int memorial_id FK "CASCADE"
        int user_id FK "CASCADE"
        timestamp created_at
        note for donations "Index: idx_memorial_id"
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

