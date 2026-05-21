# PHP contact_book

A contact management web application built with PHP 8.3, demonstrating clean architecture principles and design patterns without relying on a full framework built while following my Full Stack Web Developer course

## Overview

This project is a CRUD contact book (rubrica = address book in Italian) where users can create, view, and delete contacts with optional photo upload. A lightweight MVC-like structure built from scratch, with a custom router, service container, and interchangeable storage backends.

## Architecture

The project deliberately avoids full frameworks to show understanding of the underlying patterns they implement.


## Tech Stack

| Layer | Technology |
|---|---|
| Language | PHP 8.3 |
| Templating | Twig 3 |
| Database | MySQL (via PDO) |
| Frontend | MDB UI Kit (Material Design Bootstrap) |
| Container | Docker + Apache |
| Dependency Management | Composer |


## Key Design Decisions

**Why a custom router instead of a library?**
To demonstrate understanding of how routing works under the hood — pattern matching, method dispatching, and delegate resolution via reflection.

**Why two repository implementations?**
To apply the Open/Closed Principle in practice. The JSON implementation was the original backend; the MySQL one was added without touching any page logic, only registering a different service.
