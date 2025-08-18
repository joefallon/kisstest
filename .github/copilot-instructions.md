### Core Philosophy

- **Readability First:** Code should be clear, maintainable, and self-documenting. Prioritize straightforward solutions over premature optimization.
- **Screaming Architecture:** The project's structure should immediately reveal its purpose and domain, not the frameworks or tools it uses. Business logic must be independent of external concerns like UI or databases.

### 2. Design & Structure

- **SOLID Principles:** Adhere to SOLID principles for robust, maintainable systems.
    - **Single Responsibility:** A module should have only one reason to change.
    - **Open/Closed:** Entities should be open for extension but closed for modification.
    - **Liskov Substitution:** Subtypes must be substitutable for their base types.
    - **Interface Segregation:** Clients should not depend on methods they don't use.
    - **Dependency Inversion:** Depend on abstractions, not concrete implementations.
- **The Dependency Rule:** All source code dependencies must point inwards toward core business logic. The core domain must not depend on implementation details (e.g., databases, web frameworks).
- **Modularity:** Decompose the system into small, reusable modules with a single responsibility. Favor composition over inheritance to share functionality.

### 3. Implementation

- **Functions and Methods:**
    - Do One Thing: A function should do one thing only. If its name includes "And," it should be split.
    - Minimal Arguments: Aim for two or fewer arguments. For more complex data, pass a single structured object.
    - Command-Query Separation (CQS): A function should either change state (a Command) or return data (a Query), but not both. Avoid side effects in queries.
- **Error & Null Handling:**
    - Handle potential failures with explicit error-handling mechanisms (e.g., exceptions, result types).
    - Throw specific, meaningful errors instead of returning nulls or error codes.
    - Avoid nulls where possible. Use language features or patterns (e.g., Option/Maybe types) to handle optional values explicitly and prevent runtime errors.
- **Conventions & State:**
    - Establish and follow a consistent naming convention for all code elements.
    - Keep the scope of all variables and state as minimal as possible.

### 4. Quality Assurance

- **Security is Paramount:**
    - Validate all external inputs at the system's boundaries.
    - Use parameterized queries or equivalent methods to prevent injection attacks.
    - Use cryptographically secure random number generators for any security-sensitive operations.
- **Testing is Essential:**
    - Structure tests using the Arrange, Act, Assert (AAA) pattern.
    - Follow the FIRST principles: Tests must be Fast, Independent, Repeatable, Self-Validating, and Timely.
    - Each test should verify a single concept. Test happy paths, edge cases, and error conditions. Aim for high test coverage (e.g., >80%).
- **Documentation & Hygiene:**
    - Let clean code serve as the primary documentation.
    - If comments are necessary, explain the *why*, not the *what*.
    - Use the standard documentation format for your language to document public APIs.
    - Remove all dead or commented-out code before committing. Use version control for history.

### 5. Process Automation
