using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using MVCworkorderDB.Models;

namespace MVCworkorderDB.Controllers
{
    public class LocationsController : Controller
    {
        private Model2 db = new Model2();

        // GET: Locations
        public ActionResult Index()
        {
            var locations = db.locations.Include(s => s.departments).Include(s => s.faculty);
            return View(locations.ToList());
        }

        // GET: Locations/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            locations locations = db.locations.Find(id);
            if (locations == null)
            {
                return HttpNotFound();
            }
            return View(locations);
        }

        // GET: Locations/Create
        public ActionResult Create()
        {
            ViewBag.department_id = new SelectList(db.departments, "id", "name");
            ViewBag.faculty_id = new SelectList(db.faculty, "id", "first_name");
            return View();
        }

        // POST: Locations/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "id,department_id,start_date,end_date,name,faculty_id")] locations locations)
        {
            if (ModelState.IsValid)
            {
                db.locations.Add(locations);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.department_id = new SelectList(db.departments, "id", "name", locations.department_id);
            ViewBag.faculty_id = new SelectList(db.faculty, "id", "first_name", locations.faculty_id);
            return View(locations);
        }

        // GET: Locations/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            locations locations = db.locations.Find(id);
            if (locations == null)
            {
                return HttpNotFound();
            }
            ViewBag.department_id = new SelectList(db.departments, "id", "name", locations.department_id);
            ViewBag.faculty_id = new SelectList(db.faculty, "id", "first_name", locations.faculty_id);
            return View(locations);
        }

        // POST: Locations/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "id,department_id,start_date,end_date,name,faculty_id")] locations locations)
        {
            if (ModelState.IsValid)
            {
                db.Entry(locations).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.department_id = new SelectList(db.departments, "id", "name", locations.department_id);
            ViewBag.faculty_id = new SelectList(db.faculty, "id", "first_name", locations.faculty_id);
            return View(locations);
        }

        // GET: Locations/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            locations locations = db.locations.Find(id);
            if (locations == null)
            {
                return HttpNotFound();
            }
            return View(locations);
        }

        // POST: Locations/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            locations locations = db.locations.Find(id);
            db.locations.Remove(locations);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
